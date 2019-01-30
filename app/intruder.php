<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class intruder extends Model
{
    protected $fillable = [
        'number_of_try',
        'ip_address'
    ];
}
