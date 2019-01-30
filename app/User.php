<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function log_introderuser(){
        $ipaddress = Request::getClientIp();
        $introuder = intruder::where('ip_address', '=', $ipaddress)->increment('number_of_try', 1);
        if($introuder == 0){
            intruder::create([
                'ip_address' => $ipaddress,
                'number_of_try' => 0
            ]);
        }
        //var_dump($introuder);

    }
}
