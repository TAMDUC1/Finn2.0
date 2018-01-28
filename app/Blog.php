<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'content','user_id','author'
    ];
    public function user(){
        return $this->belongsTo('App\User');

    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function commentsCount()
    {
        return $this->comments()
            ->selectRaw('blog_id, count(*) as aggregate')
            ->groupBy('blog_id');
    }
    public function emotions(){
        return $this->hasMany('App\Emotion');
    }

    public function emotionsCount()
    {
        return $this->emotions()
            ->selectRaw('blog_id, count(*) as aggregate')
            ->groupBy('blog_id');
    }

}
