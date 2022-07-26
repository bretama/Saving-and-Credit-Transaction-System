<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abalat;
use App\DateConvert;
use App\TimeLimitedSaving;
use DB;
use Carbon\Carbon;
use Auth;

class TimeLimitedSavingController extends Controller
{
    //
   
     public function index()
    {
        $abalats = Abalat::all();
        $timelimitsaving = TimeLimitedSaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
        
     return view('register.timelimitdisplay')->withAbalats($abalats)->withTimelimitsaving($timelimitsaving);
      //return view('registerSavings.timelimitSaving');
    }
        public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $timelimitsaving= DB::table('time_limited_savings')->where('accountNum','like','%'.$search.'%')->where('deleted_at','=',NULL)->get();
        //dd($materials);
        return view('register.timelimitdisplay')->withTimelimitsaving($timelimitsaving);
    }
     public function register()
    {
        $abalats = Abalat::all();
        return view('register.timeLimitregister')->withAbalats($abalats);   
         }
         
   
    public function store(Request $request){
      // $rules = array(
      $this->validate($request, [
           'code'=>'required',
            'amount'=>'required',
            'bank' =>'required',
            // 'sem1' => 'required',
            'month' => 'required',
            'entrydate'=>'required',
            //'leavedate'=>'required'
      ]);
     // $last = DB::table('monthly_savings')->select('amount')->where('code',$request->code)->latest()->first();
     //   $last = $last->amount;
         $timelimit = new TimeLimitedSaving;
       $username=Auth::user()->name;
        $timelimit->username = $username;
        $timelimit->accountNum = $request->code;
         $timelimit->amount = $request->amount;
         $timelimit->bank = $request->bank;
         $timelimit->recipt = $request->recipt;
         $timelimit->sem1 = $request->sem1;
         $timelimit->month = $request->month;      
         $leave=$request->leavedate;
         
         $timestamp = DateConvert::toEthiopian($leave);
         
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate2=$year."-".$month."-".$date;
        $timelimit->leavedate = $entrydate2;
       
         $leave=strtotime($entrydate2);
         $entry = $request->entrydate;
       $timestamp = DateConvert::toEthiopian($entry);
         
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
        $timelimit->entrydate=$entrydate1;
        
        $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydates=$year."-".$month."-".$date;
        $timelimit->interestdate = $entrydates; 
        $entrydates4=strtotime($entrydates);
       // if ($months==13) {
       //  $months=01;
       //  $intyear = (int)$year;
       //  $year = $intyear+1;
       //  $year = strval($year);
      
       // }
      
       //todays time
    $today = date('Y-m-d');
    $today = DateConvert::toEthiopian($today);
    $entrydate = explode("/", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       $today=$year."-".$month."-".$date;
        $today = strtotime($today);
        $ndays = ($today - $entrydates4)/86400;
        $ndaystotal = ($leave-$entrydates4)/86400;
       if ($ndaystotal<=0) {
        $interesttotal = 0;
       }
       else{
        $interesttotal = $request->amount *$ndaystotal*0.08/365.25;
      }
       $timelimit->interest = $interesttotal;
        $timelimit->total = $request->amount + $interesttotal;
      $timelimit->save();
      return redirect()->to('/timelimitdisplay')->with('success','successfully added!');
        }
       
 
    public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = TimeLimitedSaving::find($id);
      return view('register.edittimelimit')->withEdit($edit)->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
     // $last = DB::table('monthly_savings')->select('amount')->where('code',$request->code)->latest()->first();
     //   $last = $last->amount;
       $timelimit = TimeLimitedSaving::find($request->id);
       $username=Auth::user()->name;
        $timelimit->username = $username;
       $timelimit->accountNum = $request->code;
         $timelimit->amount = $request->amount;
         $timelimit->bank = $request->bank;
         $timelimit->recipt = $request->recipt;
         $timelimit->sem1 = $request->sem1;
         $timelimit->month = $request->month;      
         $leave=$request->leavedate;
         $timestamp = DateConvert::toEthiopian($leave);
         
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate2=$year."-".$month."-".$date;
        $timelimit->leavedate = $entrydate2;
         $leave=strtotime($entrydate2);
         $entry = $request->entrydate;
       $timestamp = DateConvert::toEthiopian($entry);
         
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
        $timelimit->entrydate=$entrydate1;
       $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydates=$year."-".$month."-".$date;
        $timelimit->interestdate = $entrydates; 
        $entrydates=strtotime($entrydates);
       // if ($months==13) {
       //  $months=01;
       //  $intyear = (int)$year;
       //  $year = $intyear+1;
       //  $year = strval($year);
      
       // }
      
       //todays time
    $today = date('Y-m-d');
    $today = DateConvert::toEthiopian($today);
    $entrydate = explode("/", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       $today=$year."-".$month."-".$date;
        $today = strtotime($today);
        $ndays = ($today - $entrydates)/86400;
        $ndaystotal = ($leave-$entrydates)/86400;
       
         if ($ndaystotal<=0) {
         //$timelimit->interest=0;
         $interesttotal = 0;
        
        // $interest = $request->amount * $ndays*0.0001916495551;
        $timelimit->interest = $interesttotal;
        $timelimit->total = $request->amount + $interesttotal;
       }
       else{
        $interesttotal = $request->amount *$ndaystotal*0.08/365.25;
        
        // $interest = $request->amount * $ndays*0.0001916495551;
        $timelimit->interest = $interesttotal;
        $timelimit->total = $request->amount + $interesttotal;
      }

      $timelimit->save();
      return redirect()->to('/timelimitdisplay')->with('success','successfully edited!!');
      }  

  public function destroy($id)
    {
     $timelimit = TimeLimitedSaving::find($id);
     $timelimit->delete();
     return redirect('/timelimitdisplay')->with('success','data Deleted!');
    }
      
}
