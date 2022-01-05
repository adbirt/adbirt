<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Profile extends Model
{
    protected $table='profiles';

    protected $fillable = ['gender','city','state','profession','propic','aboutmyself','fb','twitter','gp','instagram','personal_site','aboutme','linkedin','pinterest'];

    //For user Table (HasOne relation)
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public static function noty()
    {
        $user = Auth::user();
        $flag = 0;
        if ($user->profile->city == null) {
            $flag++;
        }
        if ($user->email == null) {
            $flag++;
        }
        if ($user->phone == null) {
            $flag++;
        }
        if ($user->profile->aboutmyself == null) {
            $flag++;
        }
        if ($user->profile->state == null) {
            $flag++;
        }
        if ($user->country == null) {
            $flag++;
        }
        if ($user->profile->propic == null) {
            $flag++;
        }
        if ($user->profile->gender == null) {
            $flag++;
        }
        if ($flag == 0) {
            return '';
        } else {
            // return $flag;
            return 'Kindly Update your Account information.';
        }
    }
}
