<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class Student extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$arr['students'] = Student::all();
    	return view('students.index',$arr);
    }
}
