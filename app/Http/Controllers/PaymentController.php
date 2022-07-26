<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Payment;
use DB;
use App\DateConvert;
use DataTables;
use Auth;
class PaymentController extends Controller
{
    //
     public function index()
    {
     
            $payments = Payment::paginate(10);
        return view('expenses.paymentdisplay')->withPayments($payments);
        
    }
   
    public function register()
    {
        return view('expenses.paymentregister');
    }

      public function store(Request $request)
    {   
         $this->validate($request, [
            
            'name' => 'required',
            'fname'=>'required',
            'gfname' => 'required',
            'entrydate' => 'required',
            'month'  => 'required',
            'days' => 'required',
        ]);
           
          $payment = new Payment;
        $username=Auth::user()->name;
        $payment->username = $username;
        $payment->name = $request->name;
        $payment->fname=$request->fname;
        $payment->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $payment->entrydate=$entrydate1;
        $payment->month=$request->month;
        $payment->days = $request->days;
        $payment->basicSalary = $request->basicSalary;
        $payment->transportAllowance = $request->transportAllowance;
        $payment->houseAllowance = $request->houseAllowance;
         $payment->grossEarning=$request->grossEarning;
        $payment->incomeTax = $request->incomeTax;
        $payment->pension1 = $request->pension1;
        $payment->pension2 = $request->pension2;
        $payment->totalDiduction = $request->totalDiduction;
        $payment->netPay = $request->netPay;
         $payment->save();
        return redirect()->to('/paymentdisplay')->with('success','payment saved');
    }
     public function edit($id){
        $payments = Payment::find($id);
        return view('expenses.paymentedit')->withPayments($payments);
    }
    public function update(Request $request, $id)
    {
        
         $payment = Payment::find($request->id);
        //  $username=Auth::user()->name;
        // $payment->username = $username;
           $payment->name = $request->name;
        $payment->fname=$request->fname;
        $payment->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $payment->entrydate=$entrydate1;
        $payment->month=$request->month;
        $payment->days = $request->days;
        $payment->basicSalary = $request->basicSalary;
        $payment->transportAllowance = $request->transportAllowance;
        $payment->houseAllowance = $request->houseAllowance;
        $payment->grossEarning=$request->grossEarning;
        $payment->incomeTax = $request->incomeTax;
        $payment->pension1 = $request->pension1;
        $payment->pension2 = $request->pension2;
        $payment->totalDiduction = $request->totalDiduction;
        $payment->netPay = $request->netPay;
         $payment->save();
        return redirect()->to('/paymentdisplay')->with('success','payment updated');
    }
     public function destroy($id)
    {
     $payment = Payment::find($id);
     $payment->delete();
     return redirect('/paymentdisplay')->with('success','payment deleted!');
    }
    public function indexx(Request $request)
    {
        if ($request->ajax()) {
            $data = Payment::latest()->get();
            return DataTables::of($data)->addColumn('action',function($data){
                $button = '<button type="button" name = "edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                 $button= '
                     &nbsp;&nbsp;&nbsp;<button type="button" name = "edit" id="'.$data->id.'" class="delete btn btn-primary btn-sm">Edit</button>';
            });
            
        }
    }
}
