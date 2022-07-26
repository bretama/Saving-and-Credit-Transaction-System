<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TeaCoffee;
use DB;
use App\DateConvert;
use PDF;
use Auth;
class TeaCoffeeController extends Controller
{
     public function index()
    {
     
            $teacoffees = TeaCoffee::paginate(10);
        return view('expenses.teacoffeedisplay')->withTeacoffees($teacoffees);
        
    }
   
    public function register()
    {
        return view('expenses.teacoffeeregister');
    }

      public function store(Request $request)
    {   
         $this->validate($request, [
            
            'name' => 'required',
            'fname'=>'required',
            'gfname' => 'required',
            'entrydate' => 'required',
            'month'  => 'required',
            'type' => 'required',
            'totalnum' => 'required',
            'forone' => 'required',
        ]);
            
          $teacoffee = new TeaCoffee;
        $username=Auth::user()->name;
        $teacoffee->username = $username;
        $teacoffee->name = $request->name;
        $teacoffee->fname=$request->fname;
        $teacoffee->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $teacoffee->entrydate=$entrydate1;
        $teacoffee->month=$request->month;
        $teacoffee->type = $request->type;
        $teacoffee->totalnum = $request->totalnum;
        $x=$request->totalnum;
        $teacoffee->forone = $request->forone;
        $y=$request->forone;
          $total=$x * $y;
         $teacoffee->total = $total;
         $teacoffee->save();
        return redirect()->to('/teacoffeedisplay')->with('success','teacoffee saved');
    }
     public function edit($id){
        $teacoffees = TeaCoffee::find($id);
        return view('expenses.teacoffeeedit')->withTeacoffees($teacoffees);
    }
    public function update(Request $request, $id)
    {
        
         $teacoffee = TeaCoffee::find($request->id);
        //  $username=Auth::user()->name;
        // $teacoffee->username = $username;
          $teacoffee->name = $request->name;
        $teacoffee->fname=$request->fname;
        $teacoffee->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $teacoffee->entrydate=$entrydate1;
        $teacoffee->month=$request->month;
        $teacoffee->type = $request->type;
        $teacoffee->totalnum = $request->totalnum;
        $x=$request->totalnum;
        $teacoffee->forone = $request->forone;
        $y=$request->forone;
        $total=$x * $y;
         $teacoffee->total = $total;
         $teacoffee->save();
        return redirect()->to('/teacoffeedisplay')->with('success','teacoffee updated');
    }
     public function destroy($id)
    {
     $teacoffee = TeaCoffee::find($id);
     $teacoffee->delete();
     return redirect('/teacoffeedisplay')->with('success','teacoffee deleted!');
    }
    function indexx()
    {
        $customerData = $this->get_customer_data();
        return view('dynamic_pdf')->withCustomerData($customerData);
    }
    function get_customer_data(){
        $customerdata = DB::table('tea_coffees')->limit(10)->get();
        return $customerdata;
    }
    function pdf(){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        $pdf->stream();
    }
    function convert_customer_data_to_html(){
        $customer_data = $this->get_customer_data();
        $output = '
         <h3 align = "center">Customer Data</h3>
         <table width="100%" style="border-collapse:collapse; border:0px;">
         <tr>
         <th style="border:1px solid; padding:12px;" width="20%">Name</th>
         <th style="border:1px solid; padding:12px;" width="30%">Fname</th>
         <th style="border:1px solid; padding:12px;" width="15%">Gfname</th>
         <th style="border:1px solid; padding:12px;" width="15%">Numdays</th>
         <th style="border:1px solid; padding:12px;" width="20%">Month</th>
          <th style="border:1px solid; padding:12px;" width="15%">entrydate</th>
         <th style="border:1px solid; padding:12px;" width="20%">Total</th>

        </tr>';
        foreach ($customer_data as $customer) {
            $output .= '
           <tr>
           <td style="border:1px solid; padding:12px;">'.$customer->name.'</td>
           <td style="border:1px solid; padding:12px;">'.$customer->fname.'</td>
           <td style="border:1px solid; padding:12px;">'.$customer->gfname.'</td>
           <td style="border:1px solid; padding:12px;">'.$customer->numdays.'</td>
           <td style="border:1px solid; padding:12px;">'.$customer->month.'</td>
           <td style="border:1px solid; padding:12px;">'.$customer->entrydate.'</td>
           <td style="border:1px solid; padding:12px;">'.$customer->total.'</td>
            ';
            # code...
        }
        $output .= '</table>';
        return $output;
    }
}
