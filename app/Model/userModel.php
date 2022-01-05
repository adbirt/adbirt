<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    //
    protected $table = 'users';
    protected $fillable = ["id","name","login","email","phone","password","birthday","country","address","active","remember_token","created_at","updated_at"];
    protected $guarded = array('id');

    function GetVendor()
    {
        return $this->hasOne('App\rolesModel','user_id','id');
    }
}
