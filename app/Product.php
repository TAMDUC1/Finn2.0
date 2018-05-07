<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    protected $fillable = [
        'description', 'price','stock','name','type','imagePath'
    ];
    public $sortable = ['id', 'name', 'price', 'created_at', 'updated_at'];

    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }
}
