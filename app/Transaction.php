<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [];
    protected $guarded = [];

    protected $table = 'transactions';


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function method()
    {
        return $this->belongsTo('App\PaymentMethod', 'method_id', 'id');
    }
}
