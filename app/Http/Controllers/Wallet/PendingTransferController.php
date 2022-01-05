<?php

namespace app\Http\Controllers\Wallet;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use App\User;
use App\Profile;
use App\PendingTransfers;
use App\Transaction;
use App\PaymentMethod;
use Validator;
use App\Model\WalletHistoryModel;
use App\Model\NotificationAlertModel;
use Auth;
use Hash;
use DB;
use Redirect;
use App\Role;
use Mail;
use App\Http\Requests\TransferRequest;
use View;

class PendingTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendings = PendingTransfers::all();

        return view('wallet.admin.pending_transfer.index')
            ->with('title', 'Pending Transfers')
            ->with('pendings', $pendings);
    }





    /**
     * Pending transfer request Accept
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function accept($id)
    {
        $pending = PendingTransfers::find($id);

        $Balance = Transaction::select('amount')
                                 ->where('user_id',$pending->user_id)
                                 ->first();
        
        $update['amount'] = $Balance['amount'] + $pending->amount;

        $update['method_id'] = PaymentMethod::where('name', 'Bank Transfer')->first()->id;


        $Transdone = Transaction::where('user_id',$pending->user_id)
                              ->update($update);

        if ($Transdone) {
            
            $pending->delete();

            $wallet            = new WalletHistoryModel;
            $wallet->user_id  = $pending->user_id;
            $wallet->amount  = $pending->amount;
            $wallet->commision  = "0";
            $wallet->mode  = "WalletCredit";
            $wallet->comment  = "Added $".$pending->amount." money through Bank Deposit";
            $wallet->save();

            $Notify            = new NotificationAlertModel;
            $Notify->heading  = "Money is Credited";
            $Notify->content  = "Added $".$pending->amount." money through Bank Deposit";
            $Notify->type  = "Credit";
            $Notify->Notify_Receivers_Id  = $pending->user_id;
            $Notify->save();

            return redirect()->route('pending.index')->with('success', 'You Have Successfully Accepted The Transfer!');
        } else {
            return redirect()->route('pending.index')->with('error', 'Sorry, Something Went Wrong. Try Again.');
        }
    }

    public function decline($id)
    {
        try {
            $pending = PendingTransfers::find($id);

            PendingTransfers::destroy($id);

            $Notify            = new NotificationAlertModel;
            $Notify->heading  = "Request is Declined By Admin";
            $Notify->content  = "Request of Add $".$pending->amount." money through Bank Deposit is Declined By Admin";
            $Notify->type  = "decline";
            $Notify->Notify_Receivers_Id  = $pending->user_id;
            $Notify->save();

            return redirect()->route('pending.index')->with('success', 'You Have Successfully Declined The Transfer!');
        } catch (\Exception $e) {
            return redirect()->route('pending.index')->with('error', 'Sorry, Something Went Wrong. Try Again.');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallet.user.transfer_request.create')
            ->with('title', 'Request Transfer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransferRequest $request)
    {
        $pending = new PendingTransfers();

        $pending->amount = $request->amount;
        $pending->bank = $request->bank;
        $pending->date = $request->date;
        $pending->user_id = Auth::user()->id;

        if ($request->has('comment')) {
            $pending->comment = $request->comment;
        }

        if ($pending->save()) {

            $Notify            = new NotificationAlertModel;
            $Notify->heading  = Auth::user()->name." has Requested to Add Money to Wallet Via BANK DEPOSIT";
            $Notify->content  = Auth::user()->name." has Requested to Add $".$request->amount." Money to Wallet Via BANK DEPOSIT";
            $Notify->type  = "WalletCredit";
            $Notify->Notify_Receivers_Id  = "1";
            $Notify->save();

            return redirect()->route('pending.create')->with('success', 'Your Bank Deposit Request is being processed...');
        } else {
            return redirect()->route('pending.create')->with('error', 'Sorry. Somethig Went Wrong. Please Try Again.');
        }
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
