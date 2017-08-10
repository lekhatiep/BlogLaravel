<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class CommentsController extends Controller
{
    //
    public function index(){
    	$comments=Comment::all();
        return view('admin.comment',compact('comments'));
    }
    public function edit(){

    } 
    public function delete(){

    }
    public function store(Request $request, $post_id){
    	// dd($request->all());
    	$this->validate($request,array(
    		'name' => 'required|max:255',
    		'email'=>'required|email|max:255',
    		'comment'=>'required|min:5|max:2000'
    		));
    	$post =Post::find($post_id);
    	$comment = new Comment();
    	$comment->name = $request->name;
    	$comment->email= $request->email;
    	$comment->comment = $request->comment;
        $comment->user_id =$request->user_id;
    	$comment->post()->associate($post);
    	$comment->save();
    	return redirect()->route('blog.single',[$post->slug]);
    	
    }
}
