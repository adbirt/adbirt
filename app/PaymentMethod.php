<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [];
    protected $guarded = [];

    protected $table = 'payment_methods';

    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'method_id', 'id');
    }
}
