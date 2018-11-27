<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Auth;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
	public function getUpload()
	{
		return view('upload');	
	}

	public function postUpload(Request $request)
	{
		$user = Auth::user();
		$file = $request->file('picture');
		$filename = uniqid($user->id . "_") . "." . $file->getClientOriginalExtension();
		//store file in the 'public' folder - create link storage-public folder
		Storage::disk('public')->put($filename, File::get($file));
		//update the user record with the new profile pic filename
		$user->profile_pic = $filename;
		$user->save();

		//create the thumbnail and save it
		$thumb = Image::make($file);
		$thumb->fit(200, 300);
		$png = (string) $thumb->encode('png');

		return redirect('upload')->with('filename', $filename);
	}
}
