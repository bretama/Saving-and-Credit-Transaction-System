<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Share;
use DB;
use PDF;
use App\Abalat;
use App\DateConvert;
use Auth;
class ShareController extends Controller
{
	// public function index()
	// {
	// 	return view('share.sharedisplay');
	// }

     public function search(Request $request)
    {
       $abalats = Abalat::all();
        $share = Share::paginate(10);
        $search = $request->get('search');
        $share = DB::table('shares')->where('accountNum','like','%'.$search.'%')->where('deleted_at','=',NULL)->get();
        //dd($materials);
       return view('share.sharedisplay')->withAbalats($abalats)->withShare($share);
    }


    public function users()
    {
    	return DataTables::of(Share::query())->make(true);
    }
     public function index()
    {
        $abalats = Abalat::all();
        $share = Share::paginate(10);
    //      $abalmonth = DB::table('abalats')
    // ->join('share_savings', 'abalats.id', '=', 'share_savings.code')->get(); 
     return view('share.sharedisplay')->withAbalats($abalats)->withShare($share);
    }
    public function register()
    {
     
      // $abalats = Abalat::all();
      //   return view('share.shareregister')->withAbalats($abalats);
        $abalats = Abalat::all();
         return view('share.shareregister')->withAbalats($abalats);
    }
    public function store(Request $request){
      $this->validate($request, [
           'code'=>'required',
            'amount'=>'required',
            'month' => 'required',
            'entrydate'=>'required',
            
      ]);
      
         $share = new Share;
         $username=Auth::user()->name;
        $share->username = $username;
        $share->accountNum = $request->code;
         $share->month = $request->month;
          $share->bank = $request->bank;
         $share->recipt = $request->recipt;
         $share->amount = $request->amount;
         
         
         $entry = $request->entrydate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $share->entrydate=$entrydate1;
       
      $share->save();
      return redirect()->to('/sharedisplay')->with('success','successfully registered');
        }
      
    public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = Share::find($id);
      return view('share.shareedit')->withEdit($edit)->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
     
       $share = Share::find($request->id);
       // $username=Auth::user()->name;
       //  $share->username = $username;
        $share->accountNum = $request->code;
         $share->month = $request->month;
         $share->bank = $request->bank;
         $share->recipt = $request->recipt;
         $share->amount = $request->amount;
         
         $entry = $request->entrydate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $share->entrydate=$entrydate1;
      $share->save();
     return redirect()->to('/sharedisplay')->with('success','successfully updated');
    }
      
    public function destroy($id)
    {
     $share = Share::find($id);
     $share->delete();
     return redirect('/sharedisplay')->with('success','data deleted!');
    }
    public function export_pdf()
  {
    // Fetch all customers from database
    $share= Share::get();
    // Send data to the view using loadView function of PDF facade
    $pdf = PDF::loadView('share.sharedisplay', compact('share'));

    // If you want to store the generated pdf to the server then you can use the store function
    $pdf->save(storage_path().'_filename.pdf');
    // Finally, you can download the file using download function
    return $pdf->download('customers.pdf');
  }

  
}
