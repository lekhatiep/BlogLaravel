<?php

namespace App;
use App\Comment;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Post extends Model
{
    //
    // public function post(){
    // 	return $this->hasMany(Comment::class);
    // }
     protected $fillable = [
        'title', 'body'
    ];
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTO('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
