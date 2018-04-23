<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'description', 'price','stock','name','type','imagePath'
    ];
    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }
}
