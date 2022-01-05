<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class campaignorders extends Model
{
    //
    protected $table = 'campaign_orders';

    function campaign()
    {
        return $this->hasOne('App\Model\campaign','id','campaign_id');
    }
    function advertiser()
    {
        return $this->hasOne('App\User','id','advertiser_id');
    }
    function publisher()
    {
        return $this->hasOne('App\User','id','publisher_id');
        
    }
}
