<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DateConvert;
use App\Comission;
use Auth;
class ComissionController extends Controller
{
    //
     public function index()
    {
     
            $comissions = Comission::paginate();
        return view('expenses.comissiondisplay')->withComissions($comissions);
    	
    }
   
    public function register()
    {
    	return view('expenses.comissionregister');
    }

      public function store(Request $request)
    {   
    	 $this->validate($request, [
            
            'name' => 'required',
            'fname'=>'required',
            'gfname' => 'required',
            'entrydate' => 'required',
            'month'  => 'required',
            'typedone' => 'required',
            'numcoming' => 'required',
             'forone' => 'required',
           
        ]);
    	 
    	  $comission = new Comission;
        $username=Auth::user()->name;
        $comission->username = $username;
        $comission->name = $request->name;
        $comission->fname=$request->fname;
        $comission->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $comission->entrydate=$entrydate1;
        $comission->month=$request->month;
        $comission->typedone = $request->typedone;
        $comission->numcoming = $request->numcoming;
        $x=$request->numcoming;
        $comission->forone = $request->forone;
        $y = $request->forone;
         $total = $x * $y;
        $comission->total = $total;
         $comission->save();
        return redirect()->to('/comissiondisplay')->with('success','commission saved');
    }
     public function edit($id){
        $comissions = Comission::find($id);
        return view('expenses.comissionedit')->withComissions($comissions);
    }
    public function update(Request $request, $id)
    {
        
         $comission = Comission::find($request->id);
        //  $username=Auth::user()->name;
        // $comission->username = $username;
         $comission->name = $request->name;
        $comission->fname=$request->fname;
        $comission->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $comission->entrydate=$entrydate1;
        $comission->month=$request->month;
        $comission->typedone = $request->typedone;
        $comission->numcoming = $request->numcoming;
        $x=$request->numcoming;
        $comission->forone = $request->forone;
        $y = $request->forone;
         $total = $x * $y;
        $comission->total = $total;
         $comission->save();
        return redirect()->to('/comissiondisplay')->with('success','commission updated');
    }
     public function destroy($id)
    {
     $comission = Comission::find($id);
     $comission->delete();
     return redirect('/comissiondisplay')->with('success','commision deleted!');
    }
}
