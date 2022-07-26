<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abalat;
use App\Submember;
use App\DateConvert;
use DB;
use PDF;
use Auth;
class SubmembersController extends Controller
{
	 public function index()
    {
 //         $abalats = DB::table('abalats')
 // ->join('submembers', 'abalats.code', '=', 'submembers.accountNum')->orderby('accountNum','ASC')->get(); 
        // $customer_data = $this->get_customer_data();
        $abalats = Submember::all();
       
        return view('register.submemberdisplay')->withAbalats($abalats); 
        // $pdf = PDF::loadView('register.submemberdisplay', $abalats);
  
        // return $pdf->download('itsolutionstuff.pdf');  

         }
    //
         function get_customer_data()
    {
        $customer_data=DB::table('submembers')->limit(10)->get();
        return $customer_data;
    }
    function pdf()
    {
        $pdf = \PDF::loadView('register.submemberdisplay') ;
        return $pdf->download('namepdf');
        $pdf = \App::make('dompdf_wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        $pdf->stream();
    }
    function convert_customer_data_to_html()
    {
        $customer_data=$this->get_customer_data();
        $output = '
     <h3 align = "center">Customer Data</h3>
     <table width = "100%" style="border-collapse:collapse; border:0px;">
     <tr>
        <th style="border:1px solid; padding:12px;" width="20%">code</th>
        <th style="border: 1px solid; padding:12px;" width="30%">name</th>
        <th style="border:1px solid; padding:12px;" width="15%">fname</th>
        <th style="border:1px solid; padding:12px;" width="15%">number</th>
        </tr>
    ';
    foreach ($customer_data as $customer) {
        $output .= '
         <tr>
            <td style = "border:1px solid; padding:12px;">' .$customer->code.'</td>
            <td style = "border:1px solid; padding:12px;">' .$customer->name.'</td>
            <td style = "border:1px solid; padding:12px;">' .$customer->fname.'</td>
            <td style = "border:1px solid; padding:12px;">' .$customer->number.'</td>
        ';
    }
    $output .= '</table>';
    return $output;
  }
    
     public function register()
     {
     	$abalats = Abalat::all();
        return view('register.submemberregister')->withabalats($abalats);  
     }


          public function store(Request $request){
      // $rules = array(
                 $this->validate($request, [
                 'code'=>'required',
                 'name' => 'required',
                 'fname' =>'required',
                 'entrydate' => 'required'
         	]);
         	//$summembers=DB::select('SELECT code, count(number) FROM submembers GROUP BY code');
         	$submember = new Submember;
            $username=Auth::user()->name;
        $submember->username = $username;
         	$submember->accountNum = $request->code;
         	$submember->name = $request->name;
         	$submember->fname = $request->fname;
         	$submember->number = 1;
            $entry = $request->entrydate;
      $timestamp = DateConvert::toEthiopian($entry);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $submember->entrydate=$entrydate1;
         	
         	$submember->save();
         	return redirect()->to('/submemberdisplay');
         }
          public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = Submember::find($id);
      return view('register.submemberedit')->withEdit($edit)->withAbalats($abalats);
    }
        public function update(Request $request, $id)
    {
     
       $submember = Submember::find($request->id);
        
      
      $submember = new Submember;
      $username=Auth::user()->name;
        $submember->username = $username;
         	$submember->accountNum = $request->code;
         	$submember->name = $request->name;
         	$submember->fname = $request->fname;
            $submember->number = 1;
         	$entry = $request->entrydate;
             $timestamp = DateConvert::toEthiopian($entry);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $submember->entrydate=$entrydate1;
         	$submember->save();
         	return redirect()->to('/submemberdisplay');
    }
    public function destroy($id)
    {
     $submember = Submember::find($id);
     $submember->delete();
     return redirect('/submemberdisplay')->with('success','deleted!');
    }
}
