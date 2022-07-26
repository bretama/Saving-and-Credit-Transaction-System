<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdditionalExpense;
use DB;
use App\DateConvert;
use Auth;
class AdditionalExpensesController extends Controller
{
      
     public function index()
    {
     
            $additionalexpenses = AdditionalExpense::all();
        return view('expenses.additionalexpensedisplay')->withAdditionalexpenses($additionalexpenses);
    	
    }
        public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $additionalexpenses= DB::table('additionalexpenses')->where('name','like','%'.$search.'%')->where('fname','like','%'.$search.'%')->paginate(10);
        //dd($materials);
        return view('expenses.additionalexpensedisplay')->withAdditionalexpenses($additionalexpenses);
    }
   
    public function register()
    {
    	return view('expenses.additionalexpenseregister');
    }

      public function store(Request $request)
    {   
    	 $this->validate($request, [
            
            'name' => 'required',
            'fname'=>'required',
            'gfname' => 'required',
            'entrydate' => 'required',
            'month'  => 'required',
            'numdays' => 'required',
           
        ]);
    	 
    	  $additionalexpense = new AdditionalExpense;
        $username=Auth::user()->name;
        $additionalexpense->username = $username;
        $additionalexpense->name = $request->name;
        $additionalexpense->fname=$request->fname;
        $additionalexpense->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $additionalexpense->entrydate=$entrydate1;
        $additionalexpense->month=$request->month;
        $additionalexpense->numdays = $request->numdays;
        $additionalexpense->type = $request->type;
        $additionalexpense->amount = $request->amount;
        $additionalexpense->receipt = $request->receipt;
         $additionalexpense->save();
        return redirect()->to('/additionalexpensedisplay')->with('success','additionalexpense saved');
    }
     public function edit($id){
        $additionalexpenses = AdditionalExpense::find($id);
        return view('expenses.additionalexpenseedit')->withAdditionalexpenses($additionalexpenses);
    }
    public function update(Request $request, $id)
    {
        
         $additionalexpense = additionalexpense::find($request->id);
         $username=Auth::user()->name;
        $additionalexpense->username = $username;
         $additionalexpense->name = $request->name;
        $additionalexpense->fname=$request->fname;
        $additionalexpense->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $additionalexpense->entrydate=$entrydate1;
        $additionalexpense->month=$request->month;
        $additionalexpense->numdays = $request->numdays;
        $additionalexpense->type = $request->type;
        $additionalexpense->amount = $request->amount;
        $additionalexpense->receipt = $request->receipt;
         $additionalexpense->save();
        return redirect()->to('/additionalexpensedisplay')->with('success','additionalexpense updated');
    }
     public function destroy($id)
    {
     $additionalexpense = AdditionalExpense::find($id);
     $additionalexpense->delete();
     return redirect('/additionalexpensedisplay')->with('success','data deleted!');
    }
}
