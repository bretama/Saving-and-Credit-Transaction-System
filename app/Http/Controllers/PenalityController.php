<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abalat;
use Carbon\Carbon;
use App\Penality;
use App\DateConvert;
use App\dateConverter;
use DB;
use Auth;
class PenalityController extends Controller
{

    public function index()
    {

        $today1= Carbon::now();
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;
         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);

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
       $penalities = Penality::orderBy('accountNum', 'ASC')->where('deleted_at','=',NULL)->where('entrydate','<=',$entrydate111)->get();
       
        
     return view('register.penalitydisplay')->withAbalats($abalats)->withPenalities($penalities);
    }
    public function register()
    {
      $abalats = Abalat::all();
        return view('register.penalityregister')->withAbalats($abalats);
        
     
    }
    public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $penalities= DB::table('penalities')->where('accountNum','like','%'.$search.'%')->where('deleted_at','=',NULL)->get();
        //dd($materials);
        return view('register.penalitydisplay')->withPenalities($penalities);
    }
    public function store(Request $request){
      $this->validate($request, [
           'code'=>'required',
            'penality' => 'required',
            'bank' =>'required',
            'entrydate'=>'required',
            'month' => 'required',
            'type'    =>'required'
//           
      ]);
   
      
         $penality = new Penality;
         $username=Auth::user()->name;
        $penality->username = $username;
         $penality->accountNum = $request->code;
         $penality->penality = $request->penality;
         $penality->bank = $request->bank;
         // $penality->recipt = $request->recipt;
         
         $penality->month = $request->month;
         $entry = $request->entrydate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        
         $penality->entrydate=$entrydate1;   
         $penality->type = $request->type;
        //dd($new_date_format);
          $penality->save();
          return redirect()->to('/penalitydisplay')->with('success','data saved');
              //return redirect()->to('/');
    
    }
   public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = Penality::find($id);
      return view('register.editpenality')->withEdit($edit)->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
     
         $penality = Penality::find($request->id);
        //  $username=Auth::user()->name;
        // $penality->username = $username;
         $penality->accountNum = $request->code;
         $penality->penality = $request->penality;
         $penality->bank = $request->bank;
         // $penality->recipt = $request->recipt;
         
         $penality->month = $request->month;
         $entry = $request->entrydate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        
         $penality->entrydate=$entrydate1;   
         $penality->type = $request->type;
        //dd($new_date_format);
          $penality->save();
          return redirect()->to('/penalitydisplay')->with('success','data updated');
}
public function destroy($id)
    {
     $penality = Penality::find($id);
     $penality->delete();
     return redirect('/penalitydisplay')->with('success','data deleted!');
    }
}