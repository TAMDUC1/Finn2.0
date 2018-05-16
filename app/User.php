<?php

namespace App;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isAdmin'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function blogs(){
        return $this->hasMany('App\Blog');
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function emotions(){
        return $this->hasMany('App\Comment');
    }
    public function carts(){
        return $this->hasOne('App\Cart');
    }
}
