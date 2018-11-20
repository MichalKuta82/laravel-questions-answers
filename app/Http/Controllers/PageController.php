<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function profile($id)
    {
    	$user = User::findOrFail($id);
    	return view('profile')->with('user', $user);
    }
}
