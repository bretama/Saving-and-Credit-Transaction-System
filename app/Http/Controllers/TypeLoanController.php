<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Abalat;
use Auth;
use App\TypeLoan;

class TypeLoanController extends Controller
{
   
     public function index()
    {
        $abalats = Abalat::paginate(3);
        $typecredit = TypeLoan::paginate(3);
        $abalatstypecredit = DB::table('abalats')
    ->join('type_loans', 'abalats.id', '=', 'type_loans.code')->get(); 
     return view('credits.typecredit.typecreditdisplay')->withAbalats($abalats)->withTypecredit($typecredit)->withAbalattypecredit($abalatstypecredit);
    }
    public function register()
    { 
      $abalats = Abalat::all();
        return view('credits.typecredit.creditidbutton')->withAbalats($abalats);
    }
    public function store(Request $request){
      $this->validate($request, [
           //'code'=>'required',
            'amount'=>'required',
            'month' => 'required',
            'creditDate'=>'required',
            'firstDate' =>'required',
            'finalDate'    =>'required'
      ]);
    
         $typecredit = new TypeLoan;
         $username=Auth::user()->name;
        $typecredit->username = $username;
        $typecredit->accountNum = $request->code;
        $typecredit->amount = $request->amount;
         $typecredit->month = $request->month;
          $entry = $request->creditDate;
        $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $typecredit->creditDate = $entrydate1;
          $firstdate = $request->firstDate;
        $timestamp = DateConvert:: toEthiopian($firstdate);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate2=$year."-".$month."-".$date;
         $typecredit->firstDate = $entrydate2;
         $finaldate = $request->finalDate;
         $timestamp = DateConvert:: toEthiopian($finaldate);
        
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate3=$year."-".$month."-".$date;
         $typecredit->finalDate = $entrydate3;
      
       //todays time
     $today = date('Y-m-d');
   // $today= Carbon::now()->addMonths(1);
    $today = DateConvert::toEthiopian($today);
    $entrydate = explode("/", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       $today=$year."-".$month."-".$date;
        $today = strtotime($today);
         $entry = $request->creditDate;
        $creditDate = explode("-", $entry);
        $year = $creditDate[0];
        $month = $creditDate[1];
        $date = $creditDate[2];
        $intmonth = (int)$month;
       $months = $intmonth+1;
       // if ($months==13) {
       //  $months=01;
       //  $intyear = (int)$year;
       //  $year = $intyear+1;
       //  $year = strval($year);
      
       // }
       $strmonth = strval($months);
        $d=$year."-".$strmonth."-".$date;
        $timestamp = DateConvert:: toEthiopian($d);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $timestamp = strtotime($entrydate1);
        $new_date_format = strtotime(date('Y-m-d', $timestamp));
        $ndays = ($today-$new_date_format)/86400; 
         $abalatstypecredit = DB::table('abalats')
    ->join('type_loans', 'abalats.id', '=', 'type_loans.code')->where('code',$request->code)->get(); 
         $numberofpayments = (strtotime($request->finalDate)-strtotime($request->firstDate))/2592000; 
         $n=$numberofpayments;
         $n = (int)$n;
         $amount = $request->amount;
         $amount = (int)$amount;
      $typecredit->save();
      return view('credits.typecredit.typecreditdisplay')->withAmount($amount)->withN($n)->withNdays($ndays)->withAbalatstypecredit($abalatstypecredit);
        }
  public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = TypeLoan::find($id);
      return view('credits.typecredit.typecreditedit')->withEdit($edit)->withAbalats($abalats);
    }
    public function type()
    {
      $abalats = Abalat::all();
      
    }
    public function update(Request $request, $id)
    {
     
       $typecredit = TypeLoan::find($request->id);
       // $username=Auth::user()->name;
       //  $typecredit->username = $username;
        $typecredit->code = $request->code;
         $typecredit->month = $request->month;
         $x=$request->amount;
         $entry = $request->creditDate;
        $creditDate = explode("-", $entry);
        $year = $creditDate[0];
        $month = $creditDate[1];
        $date = $creditDate[2];
        $intmonth = (int)$month;
       $months = $intmonth+1;
       if ($months==13) {
        $months=01;
        $intyear = (int)$year;
        $year = $intyear+1;
        $year = strval($year);
       }
       $strmonth = strval($months);
        $d=$year."-".$strmonth."-".$date;
         $timestamp = strtotime($d);
        $new_date_format = strtotime(date('Y-m-d', $timestamp));
        $today = strtotime(date('Y-m-d'));
        //dates in integer format;
        $ndays = ($today-$new_date_format)/86400;
        
        if ($ndays<=0) {
        	$interest=0;
          $typecredit->interest = $interest;
        }
        else{
        $interest =  ($request->amount * $ndays*0.1)/365.25;
        $typecredit->interest = $interest;
        }
          $w=(float)$interest;
        $f=(float)$request->pamount;
      $a=$x - $f - $w;
      $typecredit->amount=$a;
      $typecredit->pamount=$request->pamount;
         $typecredit->creditDate=$request->creditDate;
         $typecredit->finalDate=$request->finalDate;   
         $numberofpayments = (strtotime($request->finalDate)-strtotime($request->creditDate))/2592000; 
      $typecredit->save();
      return redirect()->to('/typecreditdisplay')->with('success','edited');
    }
    public function destroy($id)
    {
     $type = TypeLoan::find($id);
     $type->delete();
     return redirect('/typecreditdisplay')->with('success','ዳታ ጠፊኡ!');
    }
    public function credit(Request $request)
    {

      $abalats = Abalat::all();
     $aa=$request->code;
      $id = (int)$aa;
       
      return view('credits.typecredit.typecreditregister')->withAbalats($abalats)->withId($id);
    }
}


