<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $guarded = ['id'];
    protected $table = 'passwordreset';
}
