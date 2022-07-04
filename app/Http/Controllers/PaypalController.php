<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Config;
use Illuminate\Http\Request;
use Input;
use PayPal;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        // ...
        // setup PayPal api context
        $paypal_conf = config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function postPayment()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName('360 PRO Subscription') // item name
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice('10'); // unit price

        $item_2 = new Item();
        $item_2->setName('Extra')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice('0.50');

        $item_3 = new Item();
        $item_3->setName('Extra Commit')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice('0.50');

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems(array($item_1, $item_2, $item_3));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(11);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))
            ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        session()->put('paypal_payment_id', $payment->getId());
        // Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        return Redirect::route('dashboard')
            ->with('error', 'Unknown error occurred');
    }

    public function getPaymentStatus()
    {
        // Get the payment ID before session clear
        $payment_id = Input::get('paymentId');
        // return session()->get('paypal_payment_id');
        // return $payment_id = Session::get('paypal_payment_id');

        // clear the session payment ID
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return Redirect::route('dashboard')
                ->with('error', 'Payment failed');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        // echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') { // payment made
            return Redirect::route('dashboard')
                ->with('success', 'Payment successful');
        }
        return Redirect::route('dashboard')
            ->with('error', 'Payment failed');
    }

    ////////////.............Wallet Portion......////////////////

    public function paymentPaypal()
    {
        $current_amount = Input::get('amount');

        //adding data to session
        Session::set('amountToPay', $current_amount);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName('Add Funds to your Wallet') // item name
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($current_amount); // unit price

        $item_list = new ItemList();
        $item_list->setItems(array($item));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($current_amount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('This Payment will Add Funds to your Adbirt Wallet ');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('paypal.confirmation'))
            ->setCancelUrl(URL::route('paypal.confirmation'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                return $err_data;
                // exit;
            } else {
                die('Some error occurred, sorry for inconvenient');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        session()->put('paypal_payment_id', $payment->getId());
        // Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        return Redirect::route('dashboard')
            ->with('error', 'Unknown error occurred');
    }

    public function confirmPaypal()
    {
        $payment_id = Input::get('paymentId');
        // return session()->get('paypal_payment_id');
        // return $payment_id = Session::get('paypal_payment_id');

        // clear the session payment ID
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return Redirect::route('dashboard')
                ->with('error', 'Payment failed');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        // echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') {
            // payment made

            $_amount = Session::get('amountToPay');

            // $Balance = \App\Transaction::select('amount')
            //     ->where('user_id', Auth::user()->id)
            //     ->first();

            // $_update = array();
            // $_update['amount'] = $Balance['amount'] + $_amount;
            // $_update['method_id'] = \App\PaymentMethod::where('name', 'Paypal Transfer')->first()->id;

            // \App\Transaction::where('user_id', Auth::user()->id)->first()
            //     ->update($_update);

            $wallet = new \App\Model\WalletHistoryModel;
            $wallet->user_id = Auth::user()->id;
            $wallet->amount = $_amount;
            $wallet->commision = "0";
            $wallet->mode = "Wallet Credit";
            $wallet->pay_currency = "NGN";
            $wallet->ngn_amt = $_amount * 610;
            $wallet->credit_type = "Paystack Credit";
            $wallet->comment = "$" . $_amount . " Funds Credited Successfully via Paypal";
            $wallet->save();

            $Notify = new \App\Model\NotificationAlertModel;
            $Notify->heading = "Funds Credited";
            $Notify->content = "$" . $_amount . " Funds Credited Successfully via Paypal";
            $Notify->type = "Credit";
            $Notify->Notify_Receivers_Id = Auth::user()->id;
            $Notify->save();

            // --

            //record stored to transaction table
            $new_transaction = new \App\Transaction();
            $new_transaction->amount = $_amount;
            $new_transaction->method_id = 2; //paypal
            $new_transaction->user_id = \Auth::user()->id;

            Session::forget('amountToPay');

            if ($new_transaction->save()) {
                return Redirect::route('dashboard')
                    ->with('success', 'Payment successful');
            }
        }

        return Redirect::route('dashboard')
            ->with('error', 'Payment failed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallet.user.paypal.create')
            ->with('title', 'Add Funds to your wallet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
