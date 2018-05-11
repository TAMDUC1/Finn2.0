<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class OrderItem extends Model
{
    protected $fillable = [
        'amount','salgPriceUnit','cart_id','description','name','type','imagePath','product_id','totalPrice','order_id','user_id'

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
