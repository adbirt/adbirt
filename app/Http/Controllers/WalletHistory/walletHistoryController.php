<?php

namespace App\Http\Controllers\WalletHistory;

use App\Http\Controllers\Controller;
use App\Model\NotificationAlertModel;
use App\Model\WalletHistoryModel;
use App\PaymentMethod;
use App\Transaction;
use Auth;
use Illuminate\Http\Request;

class walletHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arrWallet = WalletHistoryModel::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        /*->get();*/
        $this->outputData['arrWallet'] = $arrWallet;

        if (Auth::user()->hasRole('vendor')) {
            return view('WalletHistory.view-wallethistory-new', compact('arrWallet'));
        }

        return view('WalletHistory.view-wallethistory', compact('arrWallet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch()
    {
        $arrWallet = WalletHistoryModel::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $this->outputData['arrWallet'] = $arrWallet;

        if (Auth::user()->hasRole('vendor')) {
            return view('WalletHistory.search-wallethistory-new', $this->outputData);
        }

        return view('WalletHistory.search-wallethistory', $this->outputData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request, $id = "")
    {
        //
        $input = $request->all();

        $arrWallet = WalletHistoryModel::where('user_id', Auth::user()->id)
            ->where('created_at', '>=', $input['startDate'] . " 00:00:00")
            ->where('created_at', '<=', $input['endDate'] . " 23:59:59")
            ->orderBy('id', 'desc')
            ->paginate(10);
        $this->outputData['arrWallet'] = $arrWallet;

        return view('WalletHistory.search-wallethistory', $this->outputData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paystackCredit(Request $request)
    {
        $input = $request->all();

        $amt = $input['amount'];

        // $Balance = Transaction::select('amount')
        //     ->where('user_id', Auth::user()->id)
        //     ->first();

        $Balance = Transaction::where('user_id', Auth::user()->id)
            ->sum('amount');

        $amt = (int) $amt;
        $ngn_amt = (int) $input['ngn_amt'] / 100;

        $update['amount'] = $Balance + $amt;
        $update['method_id'] = PaymentMethod::where('name', 'Paystack Transfer')->first()->id;

        /*$Transdone = Transaction::where('user_id',Auth::user()->id)
        ->update($update);*/

        // $Transdone = Transaction::where('user_id', Auth::user()->id)->first()
        //     ->update($update);

        // Transaction::where('user_id', Auth::user()->id)->first()
        //     ->update($update);

        $new_transaction = new Transaction();
        $new_transaction->method_id = $update['method_id'];
        $new_transaction->amount = $update['amount'];
        $new_transaction->user_id = Auth::user()->id;
        $new_transaction->save();

        $wallet = new WalletHistoryModel;
        $wallet->user_id = Auth::user()->id;
        $wallet->amount = $amt;
        $wallet->commision = "0";
        $wallet->mode = "Wallet Credit";
        $wallet->pay_currency = "NGN";
        $wallet->ngn_amt = $ngn_amt;
        $wallet->credit_type = "Paystack Credit";
        $wallet->comment = "$" . $amt . " Funds Credited Successfully via Paystack";
        $wallet->save();

        $Notify = new NotificationAlertModel;
        $Notify->heading = "Funds Credited";
        $Notify->content = "$" . $amt . " Funds Credited Successfully via Paystack";
        $Notify->type = "Credit";
        $Notify->Notify_Receivers_Id = Auth::user()->id;
        $Notify->save();

        echo "true";
        die;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
