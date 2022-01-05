<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BankDetailsModel extends Model
{
    //
    protected $table = 'bankdetails';
    protected $fillable = ["id","user_id","AccountNumber","AccountName","BankName","isDeleted","created_at","updated_at"];
    protected $guarded = array('id');
}
