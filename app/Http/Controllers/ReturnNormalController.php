<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Abalat;
use App\ReturnNormal;
use App\Normalcredit;
use App\DateConvert;
use Auth;
class ReturnNormalController extends Controller
{
    public function index()
    {
        $abalats = Abalat::paginate(3);
        $returnnormals = ReturnNormal::orderBy('normal_id', 'ASC')->where('deleted_at','=',NULL)->get();
    //     $returnnormals = DB::table('normalcredits')
    // ->join('returnnormal1s', 'normalcredits.id', '=', 'returnnormal1s.normal_id')->get(); 
     return view('credits.normalcredit.returnnormaldisplay')->withAbalats($abalats)->withReturnnormals($returnnormals);
    }
    public function register()
    { 
      $normalcredits = Normalcredit::all();
      $abalats=Abalat::all();
        return view('credits.normalcredit.returnnormalregister')->withNormalcredits($normalcredits);
    }

 public function search(Request $request)
    {
       // $materials = Material::all();
       $abalats = Abalat::paginate(3);
        $search = $request->get('search');
        $returnnormals= DB::table('return_normals')->where('normal_id','like','%'.$search.'%')->where('deleted_at','=',NULL)->orderBy('normal_id', 'ASC')->get();
        //dd($materials);
       return view('credits.normalcredit.returnnormaldisplay')->withAbalats($abalats)->withReturnnormals($returnnormals);
    }

    public function store(Request $request){
      $this->validate($request, [
           'normal_id'=>'required',
            'amount'=>'required',
            // 'month' => 'required',
            'creditDate'=>'required',
            // 'remain' =>'required'

            
      ]);
    
         $normalcredit = new ReturnNormal;
         $username=Auth::user()->name;
        $normalcredit->username = $username;
         $amount = $request->amount;
         $amount = (int)$amount;
         if ($request->status ==0) {
         $normalcredit->normal_id = $request->normal_id;
         $normalcredit->month = $request->month;
         $normalcredit->bank = $request->bank;
         // $normalcredit->recipt = $request->recipt;
         $entry = $request->creditDate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
         $year = $entrydate[2];
         $month = $entrydate[1];
         $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $normalcredit->creditDate = $entrydate1;
         if ($request->month==null) {
           $normalcredit->remain = $amount;
           $normalcredit->amount = 0;
         }
         else{
          $last = DB::table('return_normals')->select('remain')->where('normal_id',$request->normal_id)->latest()->first();
          $normalcredit->amount=$request->amount;
          $normalcredit->interest=$request->interest;
           $last = $last->remain;
           $last = $last-$request->amount;
           if($last<0){
            return redirect()->to('/returnnormaldisplay')->with('error','the inserted amount is > remain');
           }
           else{
           $normalcredit->remain = $last;
         }}
         
    //     $returnnormal = DB::table('normalcredits')
    // ->join('returnnormals', 'normalcredits.id', '=', 'returnnormals.normal_id')->where('')->get(); 
      $normalcredit->save();
      return redirect()->to('/returnnormaldisplay')->with('success','inserted');
         }
      
         elseif ($request->status==1) {
            $y = (($amount*5)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
          }
        
          else{
            $y = (($amount*12.0)/100.0); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.'and depose it first');
          }
      
        }
  public function edit($id)
    {
      $normalcredits = Normalcredit::all();
      $edit = ReturnNormal::find($id);
      return view('credits.normalcredit.returnnormaledit')->withEdit($edit)->withNormalcredits($normalcredits);
    }
    public function update(Request $request, $id)
    {
     
       $normalcredit = ReturnNormal::find($request->id);
       // $username=Auth::user()->name;
       //  $normalcredit->username = $username;
       $amount = $request->amount;
         $amount = (int)$amount;
         if ($request->status ==0) {
         $normalcredit->normal_id = $request->normal_id;
         $normalcredit->month = $request->month;
         $normalcredit->bank = $request->bank;
         // $normalcredit->recipt = $request->recipt;
        $entry = $request->creditDate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
         $year = $entrydate[2];
         $month = $entrydate[1];
         $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $normalcredit->creditDate = $entrydate1;
         if ($request->month==null) {
           $normalcredit->remain = $amount;
           $normalcredit->amount = 0;
         }
         else{
          $last = DB::table('return_normals')->select('remain')->where('normal_id',$request->normal_id)->latest()->first();
          $normalcredit->amount=$request->amount;
          $normalcredit->interest=$request->interest;
           $last = $last->remain;
           $last = $last-$request->amount;
           $normalcredit->remain = $last;
         }
        
        $normalcredit->save();
      return redirect()->to('/returnnormaldisplay')->with('success','inserted');
         }
      
         elseif ($request->status==1) {
            $y = (($amount*5)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
          }
        
          else{
            $y = (($amount*12.0)/100.0); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.'and depose it first');
          }
}
public function destroy($id)
    {
     $returnnormal = ReturnNormal::find($id);
     $returnnormal->delete();
     return redirect('/returnnormaldisplay')->with('success','deleted!');
    }
}
