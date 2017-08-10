<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use App\Tag;
class BlogController extends Controller
{
    public function getSingle($slug){
    	$post = Post::with('user')->where('slug','=',$slug)->first();
    	 $user_id = $post->user_id;
    	 $user = User::find($user_id);
    	// $id_comment=Auth::id();
        //$mail_comment=Auth::user()->email;
        //$name_comment=Auth::user()->name;
    	return view('blog.single',compact('post','user','id_comment','mail_comment','name_comment'));
    }
    public function getIndex()
    {
    	$posts =Post::orderby('id','desc')->with('user')->paginate(5);
    	return view('blog.index',compact('posts'));
    }
}
