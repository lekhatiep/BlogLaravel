<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    // public function comment()
    // {
    // 	return $this->belongsTo(Post::class);
    // }
     public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
