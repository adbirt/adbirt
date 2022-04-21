<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NotificationAlertModel extends Model
{
    protected $table = 'notificationalert';
    protected $fillable = ["id", "heading", "content", "type", "status"];
    protected $guarded = array('id');
    public $timestamps = false;
}
