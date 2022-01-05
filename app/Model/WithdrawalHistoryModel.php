<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WithdrawalHistoryModel extends Model
{
    //
    protected $table = 'withdrawal_history';
    protected $fillable = ["id","user_id","amount","status","payment_type","paypal_email_id","bank_name","bank_holder_name","bank_account_number","created_at","updated_at"];
    protected $guarded = array('id');

    function GetUser()
	{
		return $this->hasOne('App\Model\userModel','id','user_id');
	}
}
