<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use DB;

class RegisterController extends Controller
{
    
    public function register()
    {
    	return view('users.register');
    }
    public function store(Request $request){
      $this->validate($request, [
           'name'=>'required',
            'fname'=>'required',
            'gfname' => 'required',
            'username'=>'required',
            'password' =>'required'
            
      ]);
    $user = Register::create(request(['name','fname','gfname','username','password']));
    auth()->login($user);
    return redirect()->to('/');
         
}
}