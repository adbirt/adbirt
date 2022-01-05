<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class countryModel extends Model
{
    protected $table = 'country';
    protected $fillable = ["id","country","isDeleted","created_at","updated_at"];
    protected $guarded = array('id');
}
