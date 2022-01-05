<?php

namespace App\Http\Controllers\owner;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\WithdrawalHistoryModel;
use App\Model\WalletHistoryModel;
use App\Model\NotificationAlertModel;
use App\Model\BankDetailsModel;
use App\Transaction;

class withDrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arrBankDetails = BankDetailsModel::where('user_id',Auth::user()->id)->get()->first();
        
        $this->outputData['BankDetails'] = $arrBankDetails;

        return view('withdraw.owner.create',$this->outputData)
                    ->with('title', 'Withdraw Fund From Your Wallet');
    }

    public function withdrawRequestProcess(Request $request){
        $input = $request->all();
        
        $WithdrawalHistory = new WithdrawalHistoryModel;
        $WithdrawalHistory->user_id  = Auth::user()->id;
        $WithdrawalHistory->amount  = $input['amount'];
        $WithdrawalHistory->payment_type  = $input['payment_type'];
        if($input['payment_type'] == 'paypal'){
            $WithdrawalHistory->paypal_email_id  = $input['paypal_email_id'];
        }else{
            $WithdrawalHistory->bank_name  = $input['bank_name'];
            $WithdrawalHistory->bank_holder_name  = $input['bank_holder_name'];
            $WithdrawalHistory->bank_account_number  = $input['bank_account_no'];
        }
        $WithdrawalHistory->save();

        $arrWalletAmt = Transaction::select('amount')
        ->where('user_id',Auth::user()->id)
        ->first();
        $final_price = $input['amount'];
        if( $arrWalletAmt['amount'] >= $final_price ){
            $amount['amount'] = $arrWalletAmt['amount'] - $final_price ;

            Transaction::where('user_id',Auth::user()->id)
            ->update($amount);

            $wallet            = new WalletHistoryModel;
            $wallet->user_id  = Auth::user()->id;
            $wallet->amount  = $final_price;
            $wallet->commision  = "0";
            $wallet->mode  = "debit";
            $wallet->comment  = "Withdrawal Requested of ".$final_price." via wallet money to admin.";
            $wallet->save();
        }
        $heading = "Withdrawal Requested";
        $TextToClient = "Dear Admin, Withdrawal Requested of ".$final_price." via wallet money by ".Auth::user()->name.".";

        $Notify            = new NotificationAlertModel;
        $Notify->heading  = $heading;
        $Notify->content  = $TextToClient;
        $Notify->type  = "WithdrawalRequested";
        $Notify->Notify_Receivers_Id  = 1;
        $Notify->save();

        \Session::flash('flash_message',"Withdrawal has been successfully done.");   
        return redirect('/withdraw/history');
    }

    public function withdrawHistory(){
        $arrWithdrawalHistory = WithdrawalHistoryModel::where('user_id',Auth::user()->id)->get();
        $this->outputData['arrWithdrawalHistory'] = $arrWithdrawalHistory;
        return view('withdraw.owner.list',$this->outputData)
        ->with('title', 'Withdraw History');
    }

    public function withdrawRequested(){
        $arrWithdrawalHistory = WithdrawalHistoryModel::where('status','Pending')->get();
        $this->outputData['arrWithdrawalHistory'] = $arrWithdrawalHistory;
        return view('withdraw.owner.list',$this->outputData)
        ->with('title', 'Withdraw History');
    }

    public function accountInfo($withdraw_id){
        $withdraw_id = base64_decode($withdraw_id);
        $arrWithdrawalHistory = WithdrawalHistoryModel::with('GetUser')->where('id',$withdraw_id)->get()->first();
        $this->outputData['arrWithdrawalHistory'] = $arrWithdrawalHistory;
        return view('withdraw.owner.account-info',$this->outputData)
        ->with('title', 'Withdraw History');
    }

    public function withdrawUpdated(Request $request){
        $input = $request->all();
        $id = $input['id'];
        if($id != ''){
            $update['status'] = 'Complete';
            WithdrawalHistoryModel::where('id',$id)
            ->update($update);

        $heading = "Withdrawal Requested";
        $TextToClient = "Dear Admin, Withdrawal Requested of ".$input['final_price']." via wallet money by ".Auth::user()->name.".";

        $Notify            = new NotificationAlertModel;
        $Notify->heading  = $heading;
        $Notify->content  = $TextToClient;
        $Notify->type  = "WithdrawalRequested";
        $Notify->Notify_Receivers_Id  = 1;
        $Notify->save();

            $result = "true";
        }else{
            $result = "false";
        }
        echo $result;
        die;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
