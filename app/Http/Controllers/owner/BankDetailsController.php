<?php

namespace App\Http\Controllers\owner;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\userModel;
use App\Profile;
use App\User;
use App\Model\rolesModel;
use App\Transaction;
use App\Model\cityModel;
use App\Model\BankDetailsModel;

class BankDetailsController extends Controller
{
	public function ownerBankDetail(Request $request){
        //
		$input = $request->all();
		$arrBankDetails = BankDetailsModel::where('user_id',Auth::user()->id)->get()->first();
		// dd($arrBankDetails);
		$this->outputData['arrBankDetails'] = $arrBankDetails;

		if(isset($input['action']) && $input['action'] == 'add'){
			$BankDetails = new BankDetailsModel;
			$BankDetails->payment_type  = $input['payment_type'];
			$BankDetails->user_id  = Auth::user()->id;
			if($input['payment_type'] == 'paypal'){
				$BankDetails->paypal_email_id  = $input['paypal_email_id'];
			}else{
				$BankDetails->bank_name  = $input['bank_name'];
				$BankDetails->bank_holder_name  = $input['bank_holder_name'];
				$BankDetails->bank_account_number  = $input['bank_account_no'];
			}
			$BankDetails->save();
			\Session::flash('flash_message',"Bank account info has been added successfully.");
			return redirect('/owner/bank-details');
		}
		if(isset($input['action']) && $input['action'] == 'edit'){
			$update_data['payment_type']  = $input['payment_type'];
			if($input['payment_type'] == 'paypal'){
				$update_data['paypal_email_id']  = $input['paypal_email_id'];
				$update_data['bank_name']  = NULL;
				$update_data['bank_holder_name']  = NULL;
				$update_data['bank_account_number']  = NULL;
			}else{
				$update_data['paypal_email_id']  = NULL;
				$update_data['bank_name']  = $input['bank_name'];
				$update_data['bank_holder_name']  = $input['bank_holder_name'];
				$update_data['bank_account_number']  = $input['bank_account_no'];
			}
			// dd($update_data);
			BankDetailsModel::where('id',$input['id'])->update($update_data);
			\Session::flash('flash_message',"Bank account info has been updated successfully.");   
			return redirect('/owner/bank-details');
		}

		return view('owner.bank-details',$this->outputData);        
	}
}
