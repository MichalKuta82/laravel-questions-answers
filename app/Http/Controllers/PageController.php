<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function profile($id)
    {
    	$user = User::with(['questions', 'answers', 'answers.question'])->find($id);
    	return view('profile')->with('user', $user);
    }
}
