<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'amount','salgPriceUnit'
    ];
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function cart(){
        return $this->belongsTo('App\Cart');
    }
    public function checkDelivery(){
           if($this->amount <= $this->product()->stock){
               return true;
           }
           else
               return false;
    }
}
