<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Withdrawal;
use DB;
use App\Abalat;
use App\DateConvert;
use Auth;
class WithdrawalController extends Controller
{
     public function index()
    {
        $abalats = Abalat::paginate(10);
       $withdrawals = Withdrawal::paginate(10);
     return view('credits.withdrawaldisplay')->withAbalats($abalats)->withWithdrawals($withdrawals);
    }
    public function register()
    { 
      $abalats = Abalat::all();
        return view('credits.withdrawalbutton')->withAbalats($abalats);
    }
    public function store(Request $request){
      $this->validate($request, [
           'code'=>'required',
          'type' =>'required',
          
            'amount'=>'required',
            'month' => 'required',
            'withdrawalDate'=>'required'
        
      ]);
    
         $withdrawal = new Withdrawal;
        $username=Auth::user()->name;
        $withdrawal->username = $username;
        $withdrawal->accountNum = $request->code;
        $withdrawal->amount = $request->amount;
         $withdrawal->month = $request->month;
         $type = $request->type;
         $withdrawal->type = $request->type;
         $entry = $request->withdrawalDate;
        $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $withdrawal->withdrawalDate = $entrydate1;
           
      $withdrawal->save();
      return redirect()->to('/withdrawaldisplay')->with('success','your withdrawal is successfull!');
        }
  public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = Withdrawal::find($id);
      return view('credits.withdrawaledit')->withEdit($edit)->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
     
       $withdrawal = Withdrawal::find($request->id);
       // $username=Auth::user()->name;
       //  $withdrawal->username = $username;
                $withdrawal->accountNum = $request->code;
        $withdrawal->amount = $request->amount;
         $withdrawal->month = $request->month;
         $type = $request->type;
         $withdrawal->type = $request->type;
         $entry = $request->withdrawalDate;
        $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
         $withdrawal->withdrawalDate = $entrydate1;
           
      $withdrawal->save();
      return redirect()->to('/withdrawaldisplay')->with('success','your withdrawal is successfully edited!');
    }
    public function destroy($id)
    {
     $normal = withdrawal::find($id);
     $normal->delete();
     return redirect('/withdrawaldisplay')->with('success','deleted!');
    }
    public function credit(Request $request)
    {

      $abalats = Abalat::all();
     $aa=$request->code;
      $id = (int)$aa;
       
      return view('credits.withdrawalregister')->withAbalats($abalats)->withId($id);
    }
}
