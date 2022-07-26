<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    
	function index()
	{
		return view('autocomplete');
	}
	function upload(Request $request)
	{
		$this->validate($request, [
			'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'

		]);
		
           $image = $request->file('select_file');
           $new_name = rand() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('images'),$new_name);
           return back()->with('success','Image uploaded Successfully')->with('path',$new_name);
	}
}
