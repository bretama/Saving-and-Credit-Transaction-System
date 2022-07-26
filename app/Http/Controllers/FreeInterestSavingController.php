<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Abalat;
use Validator;
use Response;
use Carbon\Carbon;
use Auth;
use App\DateConvert;
use App\freeInterestSaving;
use Illuminate\Support\Facedes\input;
//use App\http\Request;

class FreeInterestSavingController extends Controller
{
    //
   public function index()
    {
        $abalats = Abalat::all();
        // $freeinterestsaving = freeInterestSaving::paginate(10);
         $freeinterestsaving = freeInterestSaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
        
     return view('register.freeinterestdisplay')->withAbalats($abalats)->withfreeinterestsaving($freeinterestsaving);
      //return view('registerSavings.freeinterestSaving');
    }
        public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $freeinterestsaving= DB::table('free_interest_savings')->where('accountNum','like','%'.$search.'%')->where('deleted_at','=',NULL)->get();
        //dd($materials);
        return view('register.freeinterestdisplay')->withfreeinterestsaving($freeinterestsaving);
    }
    public function register()
    {
    	$abalats = Abalat::all();
        return view('register.freeinterestregister')->withAbalats($abalats);
    }
     
    public function store(Request $request){
  
       $this->validate($request, [
           'code'=>'required',
            'amount'=>'required',
            'bank'=>'required',
            // 'sem1' => 'required',
            'month' => 'required',
            'entrydate'=>'required',
            'type'    =>'required',
             'status' => 'required'
      ]);
     

         $free = new FreeInterestSaving;
         $saving = $request->amount;
      $save=$saving*0.8;
      $share=$saving*0.2;
       // $last = DB::table('free_interest_savings')->select('amount')->where('code',$request->code)->latest()->first();
       // $last = $last->amount;
  
       if ($request->status==0) {
        $username=Auth::user()->name;
        $free->username = $username;
        $free->accountNum = $request->code;
        $free->amount = $request->amount;
         // $free->saving = $save;
        $free->bank = $request->bank;
        $free->recipt = $request->recipt;
         $free->sem1 = $request->sem1;
         // $free->share = $share;
         $free->month = $request->month;
         $entry=$request->entrydate;
          $timestamp = DateConvert::toEthiopian($entry);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $free->entrydate=$entrydate1;
   
        
     $free->type = $request->type;
     
 
      
    
      $free->save();
      return redirect()->to('/freeinterestdisplay')->with('success','successfully saved');
        }

      // elseif ($request->status==1 && $request->case1==1) {
      //     if ($last>$request->amount) {
      //       # code...
      //       $y = (($last*5)/100); 
      //     return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
      //     }
      //    else{
      //     $y = (($request->amount*5.0)/100.0); 
      //     return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
      //    }
         
      //   }
      //   else {
      //    if ($request->case1==1) {
      //       if ($last>$request->amount) {
      //        $y = (($last*12.0)/100.0); 
      //     return redirect('/penalityregister')->with('success','your penality is '.$y.'and depose it first');
      //       # code...
      //     }
      //    }
         
      //     else{
      //       $y = (($request->amount*12.0)/100.0); 
      //     return redirect('/penalityregister')->with('success','your penality is '.$y.'and depose it first');
      //     }
         
      //   }
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
      $edit = FreeInterestSaving::find($id);
      return view('register.editfreeinterest')->withEdit($edit)->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
     
       $free = FreeInterestSaving::find($request->id);
        
      $last = DB::table('monthly_savings')->select('amount')->where('accountNum',$request->code)->latest()->first();
       $last = $last->amount;
          $saving = $request->amount;
          $save=$saving*0.8;
          $share=$saving*0.2;
  
       if ($request->status==0) {
        // $username=Auth::user()->name;
        // $free->username = $username;
         $free->accountNum = $request->code;
         // $free->saving = $save;
         $free->bank = $request->bank;
         $free->recipt =$request->recipt;
         $free->sem1 = $request->sem1;
         // $free->share = $share;
         $free->month = $request->month;
         $entry=$request->entrydate;
          $timestamp = DateConvert::toEthiopian($entry);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $free->entrydate=$entrydate1;
        $free->type = $request->type;
        $free->save();
      return redirect()->to('/freeinterestdisplay')->with('success','successfully edited');
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
     $free = FreeInterestSaving::find($id);
     $free->delete();
     return redirect('/freeinterestdisplay')->with('success','data deleted!');
    }
}