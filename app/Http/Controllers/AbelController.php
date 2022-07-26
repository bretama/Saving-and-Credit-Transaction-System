<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abel;
use App\DateConvert;
use DB;
use Auth;
class AbelController extends Controller
{
   
     public function index()
    {
     
            $abels = Abel::paginate(10);
        return view('expenses.abeldisplay')->withAbels($abels);
    	
    }
   
    public function register()
    {
    	return view('expenses.abelregister');
    }

      public function store(Request $request)
    {   
    	 $this->validate($request, [
            
            'name' => 'required',
            'fname'=>'required',
            'gfname' => 'required',
            'entrydate' => 'required',
            'month'  => 'required',
            'numdays' => 'required',
            'perday' => 'required',
        ]);
    	  $abel = new Abel;
        $username=Auth::user()->name;
        $abel->username = $username;
        $abel->name = $request->name;
        $abel->fname=$request->fname;
        $abel->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abel->entrydate=$entrydate1;
        $abel->month=$request->month;
        $abel->numdays = $request->numdays;
        $x=$request->numdays;
        $abel->perday = $request->perday;
        $y=$request->perday;
        $abel->forbed = $request->forbed;
        $z =$request->forbed;
        $abel->taxi = $request->taxi;
        $w=$request->taxi;
        $abel->receipt = $request->receipt;
        $total = $x*($y+ $z +$w);
        $abel->total = $total;
         $abel->save();
        return redirect()->to('/abeldisplay')->with('success','abel saved');
    }
     public function edit($id){
        $abels = Abel::find($id);
        return view('expenses.abeledit')->withAbels($abels);
    }
    public function update(Request $request, $id)
    {
        
         $abel = Abel::find($request->id);
         $username=Auth::user()->name;
        $abel->username = $username;
          $abel->name = $request->name;
        $abel->fname=$request->fname;
        $abel->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abel->entrydate=$entrydate1;
        $abel->month=$request->month;
        $abel->numdays = $request->numdays;
        $x=$request->numdays;
        $abel->perday = $request->perday;
        $y=$request->perday;
        $abel->forbed = $request->forbed;
        $z =$request->forbed;
        $abel->taxi = $request->taxi;
        $w=$request->taxi;
        $abel->receipt = $request->receipt;
        $total = $x*($y+ $z +$w);
        $abel->total = $total;
         $abel->save();
        return redirect()->to('/abeldisplay')->with('success','abel updated');
    }
     public function destroy($id)
    {
     $abel = Abel::find($id);
     $abel->delete();
     return redirect('/normalcreditdisplay')->with('success','data deleted!');
    }
        
}
