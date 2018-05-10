<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'receiverName','receiverPhone','email','deliveryAddress','city','nameOnCard','cardNumber','dateExpCard','totalPrice'
    ];
    public function cart(){
        return $this->belongsTo('App\Cart');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }
}
