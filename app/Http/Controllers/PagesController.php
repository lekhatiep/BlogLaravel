<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class PagesController extends Controller
{
    public function getContact(){
    	return view('pages.contact');
    }
    public function postContact(Request $request){
    	$this->validate($request,[
    		'email'=>'required|email',
    		'subject'=>'required|min:5',
    		'message'=>'min:10'
    		]);
    	$data = array(
    		'email'=>$request->email,
    		'subject'=>$request->subject,
    		'bodyMessage'=>$request->message
    		);
    	Mail::send('emails.contact',$data,function($message) use($data){
    		$message->from($data['email']);
    		$message->to('popcap10122@gmail.com');
    		$message->subject($data['subject']);
    	});
    }
}
