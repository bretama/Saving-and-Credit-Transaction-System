<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
class MainController extends Controller
{
    //
    public function index()
    {
    	return view('login');
    }
    function checklogin()
    {
    	$this->validate($request, [
          'email' => 'required|email',
          'password' => 'required|alphaNum|min:6'
    	]);
    	$user_data = array(
           'email' => $request->get('email'),
           'password' => $request->get('password')
    	);
    	if (Auth::attempt($user_data)) {
    		return redirect('/successlogin');
    		# code...
    	}
    	else
    	{
    		return back()->with('error','wrong login details');
    	}
    }
    function successlogin()
    {
    	return view('successlogin');
    }
}
