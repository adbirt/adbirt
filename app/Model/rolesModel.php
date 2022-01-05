<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class rolesModel extends Model
{
    //
    protected $table = 'role_user';
    protected $fillable = ["user_id", "role_id"];
    protected $guarded = array('user_id');
    public $timestamps = false;

    function profile()
    {
        return $this->hasOne('App\Model\companyprofile','user_id','user_id');
    }
    function GetVendor()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    function GetOwner()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    function GetClient()
    {
        return $this->hasOne('App\User','id','user_id');
        
    }
}
