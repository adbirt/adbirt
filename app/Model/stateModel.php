<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class stateModel extends Model
{
    //
    protected $table = 'state';
    protected $fillable = ["id","state","country_id","isDeleted","created_at","updated_at"];
    protected $guarded = array('id');
    
	function country()
	{
		return $this->hasOne('App\Model\countryModel','id','country_id');
	}
}
