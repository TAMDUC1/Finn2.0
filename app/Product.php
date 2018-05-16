<?php

namespace App;

use App\Scopes\PriceScope;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    protected $fillable = [
        'description', 'price','stock','name','type','imagePath','category_id'
    ];
    public $sortable = ['id', 'name', 'price', 'created_at', 'updated_at'];

    public function category(){
        return $this->belongsTo('App\Category');

    }
    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PriceScope);
    }
    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return count($this->errors);
    }
}
