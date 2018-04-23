<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     protected $fillable = [
    'id'
        ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }
    public  function totalPrice(){
        // return total price here
    }
}
