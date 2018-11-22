<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;

class PageController extends Controller
{
    public function profile($id)
    {
    	$user = User::with(['questions', 'answers', 'answers.question'])->find($id);
    	return view('profile')->with('user', $user);
    }

    public function contact()
    {
    	return view('contact');
    }

    public function sendContact(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'subject' => 'required|min:3',
    		'message' => 'required|min:10',
    	]);

    	Mail::to('michal@webmedia.ie')->send(new App\Mail\ContactForm);
    }
}
