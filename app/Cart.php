<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     protected $fillable = [
    'id','totalPrice'
        ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function order(){
        return $this->belongsTo('App\Order');
    }
    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }
    public  function totalPrice(){
       // return $this->buyDetails()->sum(DB::raw('quantity * price'));
    }
}
