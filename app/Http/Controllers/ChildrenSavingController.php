<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abalat;
use App\ChildrenSaving;
use DB;
use Carbon\Carbon;
use Auth;
use App\DateConvert;
class ChildrenSavingController extends Controller
{
    //
    public function index(){
       $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;
    	 $abalats = Abalat::all();
       $today11 = date('Y-m-d');
        $timestamp11 = DateConvert:: toEthiopian($today11);
         $entrydate11 = explode("/", $timestamp11);
        $year = $entrydate11[2];
        $month = $entrydate11[1];
        $date = $entrydate11[0];
        
          $entrydate11=$year."-".$month."-".$date;

    $today111= Carbon::now()->subMonths(7);

    $timestamp111 = DateConvert:: toEthiopian($today111);
         $entrydate111 = explode("/", $timestamp111);
        $year = $entrydate111[2];
        $month = $entrydate111[1];
        $date = $entrydate111[0];
        
          $entrydate111=$year."-".$month."-".$date;
    	 // $children = ChildrenSaving::all();
      $children  = ChildrenSaving::where('deleted_at','=',NULL)->where('entrydate','>',$entrydate11)->orderBy('accountNum', 'ASC')->get();

       return view('register.childrendisplay')->withAbalats($abalats)->withChildren($children);
    }
  public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $children= DB::table('children_savings')->where('accountNum','like','%'.$search.'%')->where('deleted_at','=',NULL)->get();
        //dd($materials);
        return view('register.childrendisplay')->withChildren($children);
    }
     public function register()
    {
        $abalats = Abalat::all();
        return view('register.childrenregister')->withAbalats($abalats);
    }
    public function store(Request $request){
    	$this->validate($request, [
             'code'=>'required',
             'amount'=>'required',
             // 'sem1' => 'required',
             'bank'=>'required',
             'month' => 'required',
             'entrydate'=>'required',
            
             'status' => 'required'
            
            
         ]);

    	$children = new ChildrenSaving;
        $saving = $request->amount;
      $save=$saving*0.8;
      $share=$saving*0.2;
       // $last = DB::table('children_savings')->select('amount')->where('code',$request->code)->latest()->first();
       // $last = $last->amount;
                $roles = DB::table('children_savings')->select('id', 'interest','interestdate','amount')->get();
     foreach ($roles as $user) {
          $entry = $user->interestdate;
         $entry = strtotime($entry);
         $today = date('Y-m-d');
         $timestamp = DateConvert:: toEthiopian($today);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $today = strtotime($entrydate1);
         $ndays = ($today-$entry)/86400;
          if($ndays<=0){
            $interest=0;
          }
          else{
          $interest = ( $user->amount * $ndays*0.09)/365.25;
           }
         DB::table('children_savings')
            ->where('id', $user->id)
            ->update(['interest' => $interest]);
}
        if ($request->status==0) {
          $username=Auth::user()->name;
        $children->username = $username;
         $children->accountNum = $request->code;
         $children->amount = $request->amount;
         $children->bank = $request->bank;
         // $children->recipt = $request->recipt;
         $children->sem1 = $request->sem1;
         $amount = $request->amount;
         $entry = $request->entrydate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        if($month==13){
          if($date==1 || $date=2){
         
          $month=12;
          $date=30;
          $year=$year;
          $entrydate1=$year."-".$month."-".$date;
        $children->entrydate=$entrydate1;
      }
      else{
        $month=1;
        $date=2;
        $year=$year+1;
        $entrydate1=$year."-".$month."-".$date;
        $children->entrydate=$entrydate1;

      }
     }
     
        elseif($month==2 && $date==30)
        {
          $date=29;
         $entrydate1=$year."-".$month."-".$date;
        $children->entrydate=$entrydate1;
        }
        else{
        $entrydate1=$year."-".$month."-".$date;
        $children->entrydate=$entrydate1;
      }
        
        $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       if($month==13){
          if($date==1 || $date=2){
         
          $month=12;
          $date=30;
          $year=$year;
          $entrydate3=$year."-".$month."-".$date;
        $children->interestdate = $entrydate3;
        }
        else{
        $month=1;
        $date=2;
        $year=$year+1;
        $entrydate3=$year."-".$month."-".$date;
        $children->interestdate = $entrydate3;
      }
    }
         elseif($month==2 && $date==30)
        {
          $date=29;
          $entrydate3=$year."-".$month."-".$date;
        $children->interestdate = $entrydate3;
        }
        else{
      $entrydate3=$year."-".$month."-".$date;
        $children->interestdate = $entrydate3;
      }
        $entrydates=strtotime($entrydate3);
       //todays time
    $today = date('Y-m-d');
    $today = DateConvert::toEthiopian($today);
    $entrydate = explode("/", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       $today=$year."-".$month."-".$date;
        $today = strtotime($today);
        $ndays = ($today-$entrydates)/86400;
        if ($ndays<=0) {
          $children->interest = 0;
        }
        else{
        $interest = ($amount*$ndays*0.09)/365.25;
         $children->interest = $interest;
       }
         $children->month = $request->month;
         $children->save();
          return redirect()->to('/childrendisplay')->with('success','successfully registered');
        }
       
         else{
          if ($request->status==1) {
            $y = (($request->amount*5)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
            # code...
          }
          else{
            $y = (($request->amount*12)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
          }
        }
  }
    public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = ChildrenSaving::find($id);
      return view('register.editchildren')->withEdit($edit)->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
     
       $children = ChildrenSaving::find($request->id);

     $saving = $request->amount;
      $save=$saving*0.8;
      $share=$saving*0.2;
       // $last = DB::table('children_savings')->select('amount')->where('accountNum',$request->code)->latest()->first();
       // $last = $last->amount;
                $roles = DB::table('children_savings')->select('id', 'interest','interestdate','amount')->get();
     foreach ($roles as $user) {
          $entry = $user->interestdate;
         $entry = strtotime($entry);
         $today = date('Y-m-d');
         $timestamp = DateConvert:: toEthiopian($today);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $today = strtotime($entrydate1);
         $ndays = ($today-$entry)/86400;
       
         if($ndays<=0){
            $interest=0;
          }
          else{
          $interest = ( $user->amount * $ndays*0.09)/365.25;
           }
         DB::table('children_savings')
            ->where('id', $user->id)
            ->update(['interest' => $interest]);
}
        if ($request->status==0) {
        //   $username=Auth::user()->name;
        // $children->username = $username;
         $children->accountNum = $request->code;
         $children->amount = $request->amount;
         $children->bank = $request->bank;
         // $children->recipt = $request->recipt;
         $amount=$request->amount;
         $children->sem1 = $request->sem1;
         $entry = $request->entrydate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        if($month==13){
          if($date==1 || $date=2){
         
          $month=12;
          $date=30;
          $year=$year;
          $entrydate1=$year."-".$month."-".$date;
        $children->entrydate=$entrydate1;
      }
      else{
        $month=1;
        $date=2;
        $year=$year+1;
        $entrydate1=$year."-".$month."-".$date;
        $children->entrydate=$entrydate1;

      }
     }
     
        elseif($month==2 && $date==30)
        {
          $date=29;
         $entrydate1=$year."-".$month."-".$date;
        $children->entrydate=$entrydate1;
        }
        else{
        $entrydate1=$year."-".$month."-".$date;
        $children->entrydate=$entrydate1;
      }

        $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         if($month==13){
          if($date==1 || $date=2){
         
          $month=12;
          $date=30;
          $year=$year;
          $entrydate3=$year."-".$month."-".$date;
        $children->interestdate = $entrydate3;
        }
        else{
        $month=1;
        $date=2;
        $year=$year+1;
        $entrydate3=$year."-".$month."-".$date;
        $children->interestdate = $entrydate3;
      }
    }
         elseif($month==2 && $date==30)
        {
          $date=29;
          $entrydate3=$year."-".$month."-".$date;
        $children->interestdate = $entrydate3;
        }
        else{
      $entrydate3=$year."-".$month."-".$date;
        $children->interestdate = $entrydate3;
      }
        
        $entrydate3=strtotime($entrydate3);
       //todays time
    $today = date('Y-m-d');
    $today = DateConvert::toEthiopian($today);
    $entrydate = explode("/", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       $today=$year."-".$month."-".$date;
        $today = strtotime($today);
        $ndays = ($today-$entrydate3)/86400;
        if ($ndays<=0) {
          $children->interest = 0;
        }
        else{
        $interest = ($amount*$ndays*0.09)/365.25;
         $children->interest = $interest;
       }
         $children->month = $request->month;  
         $children->save();
          return redirect()->to('/childrendisplay')->with('success','successfully updated!!');
        }
        
        else{
          if ($request->status==1) {
            $y = (($request->amount*5)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
            # code...
          }
          else{
            $y = (($request->amount*12)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
          }
        }
}
 public function destroy($id)
    {
     $children = ChildrenSaving::find($id);
     $children->delete();
     return redirect('/childrendisplay')->with('success','data deleted!');
    }
}
