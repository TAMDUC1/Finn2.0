<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    protected $fillable = [
        'blog_id','user_id','status'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function blog(){
        return $this->belongsTo('App\Blog');
    }

}
