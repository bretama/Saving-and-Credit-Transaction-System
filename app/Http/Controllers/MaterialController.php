<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use DB;
use Auth;
class MaterialController extends Controller
{
    //
     public function index()
    {
        
        $materials = Material::paginate(10);
        
     return view('register.materialdisplay')->withMaterials($materials);
    	//return view('registerSavings.materialtSaving');
    }
    public function register()
    {
      
        return view('register.materialregister');
        
    }
    // public function search(Request $request)
    // {
    // 	$search = $request->get('search');
    // 	$materials=DB::table('materials')->where('name','like','%'.$search.'%')->paginate(5);
    // 	return view('register.materialdisplay')->withMaterials($materials);
    // }
     public function store(Request $request){
      // $rules = array(
      $this->validate($request, [
           'type'=>'required',
            'numma'=>'required',
            'moneyToBuy' => 'required',
//             //'share' => 'required|email',
            'nameOfBuyer' => 'required',
            'date'    =>'required', 
//             //'penality' => 'required',
             'month' => 'required'
      ]);
      
         $material = new Material;
        
     $username=Auth::user()->name;
        $material->username = $username;
        $material->type = $request->type;
     
         $material->numma = $request->numma;
        $material->moneyToBuy = $request->moneyToBuy;
         $material->nameOfBuyer=$request->nameOfBuyer;
         $sum = $request->numma * $request->moneyToBuy;
         $material->sum = $sum;
         $material->date=$request->date;
         $material->month = $request->month;
      $material->save();
      return redirect()->to('/materialdisplay')->with('success','successfully saved');
}
 public function edit($id)
    {
     
      $edit = Material::find($id);
      return view('register.materialedit')->withEdit($edit);
    }
    public function update(Request $request, $id)
    {
     
 
        

         $material =Material::find($request->id);
        
     // $username=Auth::user()->name;
     //    $material->username = $username;
        $material->type = $request->type;
     
         $material->numma = $request->numma;
        $material->moneyToBuy = $request->moneyToBuy;
         $material->nameOfBuyer=$request->nameOfBuyer;
         $sum = $request->numma * $request->moneyToBuy;
         $material->sum = $sum;
         $material->date=$request->date;
         $material->month = $request->month;
      $material->save();
      return redirect()->to('/materialdisplay')->with('success','successfully saved');
}
        
  public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $materials= DB::table('materials')->where('type','like','%'.$search.'%')->paginate(5);
        //dd($materials);
        return view('register.materialdisplay')->withMaterials($materials);
    }    

 public function destroy($id)
    {
     $materials = Material::find($id);
     $materials->delete();
     return redirect('/materialdisplay')->with('success','deleted!');
    }
    
}







