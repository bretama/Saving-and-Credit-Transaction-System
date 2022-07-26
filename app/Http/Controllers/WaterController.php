<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Water;
use DB;
use Auth;
use App\DateConvert;
class WaterController extends Controller
{
   public function index()
    {
     
            $waters = Water::paginate(10);
        return view('expenses.waterdisplay')->withWaters($waters);
        
    }
   
    public function register()
    {
        return view('expenses.waterregister');
    }

      public function store(Request $request)
    {   
         $this->validate($request, [
            
            'name' => 'required',
            'fname'=>'required',
            'gfname' => 'required',
            'entrydate' => 'required',
            'month'  => 'required',
            'number' => 'required',
            'perone' => 'required',
           
        ]);
             
          $water = new Water;
        $username=Auth::user()->name;
        $water->username = $username;
        $water->name = $request->name;
        $water->fname=$request->fname;
        $water->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $water->entrydate=$entrydate1;
        $water->month=$request->month;
        $water->number = $request->number;
        $water->perone = $request->perone;
        $x=$request->number;
        $y=$request->perone;
          $total=$x * $y;
         $water->total = $total;
         $water->save();
        return redirect()->to('/waterdisplay')->with('success','water saved');
    }
     public function edit($id){
        $waters = Water::find($id);
        return view('expenses.wateredit')->withWaters($waters);
    }
    public function update(Request $request, $id)
    {
        
         $water = Water::find($request->id);
        //  $username=Auth::user()->name;
        // $water->username = $username;
           $water->name = $request->name;
        $water->fname=$request->fname;
        $water->gfname=$request->gfname;
        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $water->entrydate=$entrydate1;
        $water->month=$request->month;
        $water->number = $request->number;
        $water->perone = $request->perone;
        $x=$request->number;
        $y=$request->perone;
          $total=$x * $y;
         $water->total = $total;
         $water->save();
        return redirect()->to('/waterdisplay')->with('success','water updated');
    }
     public function destroy($id)
    {
     $water = Water::find($id);
     $water->delete();
     return redirect('/waterdisplay')->with('success','water deleted!');
    }
    function action(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data = Water::search($request->get('full_text_search_query'))->get();
            return response()->json($data);
        }
    }
}
