<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Post;
class SlideController extends Controller
{
    public function show(){
    	$post_slide =Post::all()->limit(3);
    	return view();
    }
}
