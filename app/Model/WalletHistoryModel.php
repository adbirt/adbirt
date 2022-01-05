<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WalletHistoryModel extends Model
{
    //
    protected $table = 'wallet_history';
    protected $fillable = ["id","user_id","amount","commision","mode","comment","created_at","updated_at"];
    protected $guarded = array('id');

}
