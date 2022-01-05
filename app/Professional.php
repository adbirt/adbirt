<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    protected $guarded = [];
    protected $fillable = [];

    protected $table = 'users';
    
    public function profile()
    {
        return $this->hasOne('App\Profile', 'user_id', 'id');
    }
}
