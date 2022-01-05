<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingTransfers extends Model
{
    protected $fillable = [];
    protected $guarded = [];

    protected $table = 'pending_transfers';


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


    /**
     * user Account information
     * @return mixed
     */
    public static function balance()
    {
        $amount = Transaction::where('user_id', \Auth::user()->id)->sum('amount');
        return $amount;
    }

    /**
     * user product cost
     * @return mixed
     */
    public static function productCost()
    {
        $amount = ProductPurchase::where('user_id', \Auth::user()->id)->sum('amount');
        return $amount;
    }
}
