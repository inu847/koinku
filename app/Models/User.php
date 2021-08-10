<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    function product()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function role()
    {
        return $this->hasOne('App\Models\Roles');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function gadai()
    {
        return $this->hasMany('App\Models\Gadai');
    }

    public function investasi()
    {
        return $this->hasOne('App\Models\Investasi');
    }

    public function eMoney()
    {
        return $this->hasOne('App\Models\Emoney');
    }
}
