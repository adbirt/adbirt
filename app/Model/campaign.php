<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class campaign extends Model
{
	//
	function advertiser()
	{
		return $this->hasOne('App\User', 'id', 'advertiser_id');
	}
}
