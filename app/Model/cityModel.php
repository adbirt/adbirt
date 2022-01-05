<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class cityModel extends Model
{
    //
    protected $table = 'city';
    protected $fillable = ["id","city","state_id","country_id","isDeleted","created_at","updated_at"];
    protected $guarded = array('id');
    
	function state()
	{
		return $this->hasOne('App\Model\stateModel','id','state_id');
		
	}
	function country()
	{
		return $this->hasOne('App\Model\countryModel','id','country_id');
	}
}
