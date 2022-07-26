<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;
use Auth;

class StudentController extends Controller
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
    public function create()
    {
    	return view('students.create');
    }
     public function store(Request $request, Student $student)
    {
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->save();
        return redirect('student');

        //
    }
    public function login()
    {
    	return view('students.login');
    }
    public function checklogin(Request $request)
    {
    	$this->validate($request, [
       'email' => 'required|email',
       'password' => 'required|alphaNum|min:6'
    	]);
    }

}
