<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Abalat;
use Carbon\Carbon;
use App\DateConvert;
use App\dateConverter;
use App\normalcreditSaving;
use App\Returnnormal1;
use App\Normalcredit;
use DB;
use Auth;
use App\ReturnNormal;
class NormalcreditController extends Controller
{
  //
    public function index()
    {
        $abalats = Abalat::paginate(10);
        $normalcredit = Normalcredit::paginate(10);
        $abalatsnormalcredit= Normalcredit::paginate(10);
        $aa=DB::table('normalcredits')->get('id');
        // dd($aa);
  
     return view('credits.normalcredit.normalcreditdisplay')->withAbalats($abalats)->withNormalcredit($normalcredit)->withAbalatsnormalcredit($abalatsnormalcredit);
    }
        public function searchnormal(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $abalatsnormalcredit= DB::table('normalcredits')->where('idnum','like','%'.$search.'%')->where('deleted_at','=',NULL)->get();
        //dd($materials);
        return view('credits.normalcredit.normalcreditdisplay')->withAbalatsnormalcredit($abalatsnormalcredit);
    }
    public function register()
    { 
      $abalats = Abalat::all();
        return view('credits.normalcredit.creditidbutton')->withAbalats($abalats);
    }
    public function store(Request $request){
      $this->validate($request, [
           // 'id'=>'required',
           'code'=>'required',
        //'type' =>'required',
            'normal'=>'required',
            'amount'=>'required',
            'month' => 'required',
            'creditDate'=>'required',
            'firstDate' =>'required',
            'finalDate'    =>'required'
      ]);
    $credit1 = Normalcredit::count();
        $nubrow = $credit1 + 1;
         if ($nubrow < 10) {
              $creditid = "0000".$nubrow.'N';
          } 
            elseif ($nubrow >= 10 && $nubrow <=99) {
              $creditid = "000".$nubrow.'N';
          } 
           elseif ($nubrow >= 100 && $nubrow <=999) {
              $creditid = "00".$nubrow.'N';
          } 
           elseif ($nubrow >= 1000 && $nubrow <=9999) {
              $creditid = "0".$nubrow.'N';
          } 
           elseif ($nubrow >= 10000 && $nubrow <=99999) {
              $creditid = $nubrow.'N';
          } 



          $retnormalcredit = new ReturnNormal;
         $amount = $request->amount;
         $amount = (int)$amount;
         $username=Auth::user()->name;
        $retnormalcredit->username = $username;
         $retnormalcredit->normal_id =  $creditid;
         $retnormalcredit->month = 'Loan';
         $retnormalcredit->bank = $request->bank;
         $retnormalcredit->interest=0;
         // $normalcredit->recipt = $request->recipt;
         $entry = $request->creditDate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
         $year = $entrydate[2];
         $month = $entrydate[1];
         $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $retnormalcredit->creditDate = $entrydate1;
         
           $retnormalcredit->remain = $amount;
           $retnormalcredit->amount = 0;
         
          $retnormalcredit->save();


         $normalcredit = new Normalcredit;
         $username=Auth::user()->name;
        $normalcredit->username = $username;
        $normalcredit->idnum = $creditid;
        $normalcredit->accountNum = $request->code;
        $normalcredit->amount = $request->amount;
         $normalcredit->month = $request->month;
         $normalcredit->normal = $request->normal;
         $normalcredit->term = $request->term;
         $normal = $request->normal;
         $type = $request->type;
         $normalcredit->type = $request->type;
          $entry = $request->creditDate;
        $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $normalcredit->creditDate = $entrydate1;
          $firstdate = $request->firstDate;
        $timestamp = DateConvert:: toEthiopian($firstdate);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate2=$year."-".$month."-".$date;
         $normalcredit->firstDate = $entrydate2;
         $first = $entrydate2;
         $finaldate = $request->finalDate;
         $timestamp = DateConvert:: toEthiopian($finaldate);
        
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate3=$year."-".$month."-".$date;
         $normalcredit->finalDate = $entrydate3;
      
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
         //dd($entrydate1);
         $first = strtotime($first);
         $first = strtotime(date('Y-m-d', $first));
         $timestamp = strtotime($entrydate1);
        $newdateformat = strtotime(date('Y-m-d', $timestamp));
        $ndays = ($first-$newdateformat)/86400; 
         //$abalatsnormalcredit = Abalat::all(); 
        $abalatsnormalcredit = Normalcredit::all(); 
         $numberofpayments = (strtotime($request->finalDate)-strtotime($request->firstDate))/2592000; 
         $n=$numberofpayments;
         $n = (int)$n;
         $amount = $request->amount;
         $amount = (int)$amount;
        $code = $request->code;
        //dd($ndays);
         //dd($code);
      $normalcredit->save();
     return view('credits.normalcredit.normalcreditreturndisplay')->withAmount($amount)->withN($n)->withNdays($ndays)->withAbalatsnormalcredit($abalatsnormalcredit)->withNormal($normal)->withType($type)->withCode($code)->withCreditid($creditid);
        }
  public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = Normalcredit::find($id);
      return view('credits.normalcredit.normalcreditedit')->withEdit($edit)->withAbalats($abalats);
    }
    public function normal()
    {
      $abalats = Abalat::all();
      
    }
    public function update(Request $request, $id)
    {
     
       $normalcredit = Normalcredit::find($request->id);
      $credit1 = Normalcredit::count();
        $nubrow = $credit1;
         if ($nubrow < 10) {
              $creditid = "0000".$nubrow.'N';
          } 
            elseif ($nubrow >= 10 && $nubrow <=99) {
              $creditid = "000".$nubrow.'N';
          } 
           elseif ($nubrow >= 100 && $nubrow <=999) {
              $creditid = "00".$nubrow.'N';
          } 
           elseif ($nubrow >= 1000 && $nubrow <=9999) {
              $creditid = "0".$nubrow.'N';
          } 
           elseif ($nubrow >= 10000 && $nubrow <=99999) {
              $creditid = $nubrow.'N';
          } 
      $username=Auth::user()->name;
        $normalcredit->username = $username;
        $normalcredit->accountNum = $request->code;
        $normalcredit->amount = $request->amount;
         $normalcredit->month = $request->month;
         $normalcredit->normal = $request->normal;
         $normalcredit->term = $request->term;
         $normal = $request->normal;
         $type = $request->type;
         $normalcredit->type = $request->type;
          $entry = $request->creditDate;
        $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $normalcredit->creditDate = $entrydate1;
          $firstdate = $request->firstDate;
        $timestamp = DateConvert:: toEthiopian($firstdate);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate2=$year."-".$month."-".$date;
         $normalcredit->firstDate = $entrydate2;
         $finaldate = $request->finalDate;
         $timestamp = DateConvert:: toEthiopian($finaldate);
        
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate3=$year."-".$month."-".$date;
         $normalcredit->finalDate = $entrydate3;
      
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
        $newdateformat = strtotime(date('Y-m-d', $timestamp));
        $ndays = ($today-$newdateformat)/86400; 
         $abalatsnormalcredit = DB::table('abalats')
    ->join('normalcredits', 'abalats.code', '=', 'normalcredits.accountNum')->where('accountNum',$request->code)->get(); 
         $numberofpayments = (strtotime($request->finalDate)-strtotime($request->firstDate))/2592000; 
         $n=$numberofpayments;
         $n = (int)$n;
         $amount = $request->amount;
         $amount = (int)$amount;
         $code = $request->code;
        // dd($code);
      $normalcredit->save();
     return view('credits.normalcredit.normalcreditreturndisplay')->withAmount($amount)->withN($n)->withNdays($ndays)->withAbalatsnormalcredit($abalatsnormalcredit)->withNormal($normal)->withType($type)->withCode($code)->withCreditid($creditid);
       
    }
    public function destroy($id)
    {
     $normal = Normalcredit::find($id);
     $normal->delete();
     return redirect('/normalcreditdisplay')->with('success','deleted!');
    }
    public function credit(Request $request)
    {

      $abalats = Abalat::all();
     $aa=$request->code;
      $id = (int)$aa;
       
      return view('credits.normalcredit.normalcreditregister')->withAbalats($abalats)->withId($id);
    }
       
}
