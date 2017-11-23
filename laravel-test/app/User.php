<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [d
        'firstname', 'middlename', 'lastname', 'email', 'password', 'linkedinurl', 'streetaddress', 'city', 'stateid', 'ocountryid', 'postalzipcode', 'workphone', 'workphoneextension', 'mobilephone','homephone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
