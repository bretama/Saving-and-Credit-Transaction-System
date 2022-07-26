<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavingController extends Controller
{
    public function savingdisplay()
    {
    	return view('members.savingdisplay');
    }
    public function registersaving()
    {
    	return view('members.saving');
    }
}
