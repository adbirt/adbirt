<?php

namespace app;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements
AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword,EntrustUserTrait {
        EntrustUserTrait::can as may;
        Authorizable::can insteadof EntrustUserTrait;
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','phone','country','birthday','address','gender','city','state','profession','aboutmyself'];
    // protected $fillable = ['name', 'email', 'password','phone','country','address','gender','city','state','profession','aboutmyself'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
     
    protected $hidden = ['password', 'remember_token'];

    public function profile()
    {
        return $this->hasOne('App\Profile', 'user_id', 'id');
    }

    public function pending()
    {
        return $this->hasMany('App\PendingTransfers', 'user_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'user_id', 'id');
    }
    public function Role()
    {
        return $this->hasMany('App\Model\rolesModel', 'user_id', 'id');
    }
}
