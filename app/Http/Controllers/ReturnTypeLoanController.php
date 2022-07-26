<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Abalat;
use App\ReturnTypeloan;
use App\Typeloan;

class ReturnTypeLoanController extends Controller

    public function index()
    {
        $abalats = Abalat::paginate(3);
        $returntypeloan = ReturnTypeloan::all();
        $returntypeloans = DB::table('type_loans')
    ->join('return_type_loans', 'type_loans.id', '=', 'return_type_loans.type_id')->get(); 
     return view('credits.typecredit.returntypecreditdisplay')->withAbalats($abalats)->withtypeloancredit($typeloancredit)->withReturntypeloans($returntypeloans);
    }
    public function register()
    { 
      $typeloan = Typeloan::all();
        return view('credits.typecredit.returntypecreditregister')->withTypeloan($typeloan);
    }
    public function store(Request $request){
      $this->validate($request, [
           'code'=>'required',
            'amount'=>'required',
            'month' => 'required',
            'creditDate'=>'required',
            
      ]);
    
         $typeloancredit = new ReturnTypeloan;
             $amount = $request->amount;
         $amount = (int)$amount;
         if ($request->status ==0) {
               $typeloancredit->code = $request->code;
               $typeloancredit->typeloan_id = $request->typeloan_id;
        $typeloancredit->amount = $request->amount;
         $typeloancredit->month = $request->month;
          $entry = $request->creditDate;
        $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $typeloancredit->creditDate = $entrydate1;
        
      $typeloancredit->save();
      return redirect()->to('/returntypecreditdisplay')->with('success','inserted');
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
      $typeloans = Typeloan::all();
      $edit = Returntypeloan::find($id);
      return view('credits.typecredit.returntypecreditedit')->withEdit($edit)->withTypeloans($typeloans);
    }
    public function update(Request $request, $id)
    {
     
       $typeloancredit = ReturnTypeloan::find($request->id);
         $amount = $request->amount;
         $amount = (int)$amount;
         if ($request->status ==0) {
               $typeloancredit->code = $request->code;
               $typeloancredit->typeloan_id = $request->typeloan_id;
        $typeloancredit->amount = $request->amount;
         $typeloancredit->month = $request->month;
          $entry = $request->creditDate;
        $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $typeloancredit->creditDate = $entrydate1;
        
      $typeloancredit->save();
      return redirect()->to('/credits.typecredit.returntypecreditdisplay')->with('success','inserted');
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
     $returntypeloan = ReturnTypeloan::find($id);
     $returntypeloan->delete();
     return redirect('/returntypecreditdisplay')->with('success','deleted!');
    }
}


