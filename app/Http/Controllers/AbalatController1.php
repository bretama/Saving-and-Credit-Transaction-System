<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abalat;
use Kamaln7\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\DateConvert;
use DB;
use App\MonthlySaving;
use App\ChildrenSaving;
use App\TimeLimitedSaving;
use App\VoluntarySaving;
use App\InvestmentSaving;
use App\FreeInterestSaving;
use Carbon\Carbon;
use DateTime;
use Yajra\DataTables\DataTables;

class AbalatController1 extends Controller
{
    //
    public function all()
   {
    $abalats = Abalat::all();
    return Datatables::of($abalats)
           ->addColumn('action',function($abalats){
            '<a onclick="showData('.$abalats->id.')" class="btn btn-sm btn-success">Show</a>'.' '.
            '<a onclick="editForm('.$abalats->id.')" class="btn btn-sm btn-info">Edit</a>'.' '.
            '<a onclick="deleteData('.$abalats->id.')" class="btn btn-sm btn-danger">Delete</a>';
           })->make(true);
   }
    public function display()
    {
     
            $abalats = Abalat::all();

        return view('members.abalatdisplay1')->withAbalats($abalats);
        $dt = Carbon::create(2012, 1, 31, 0);

echo $dt->toDateTimeString();            // 2012-01-31 00:00:00

echo $dt->addYears(5);                   // 2017-01-31 00:00:00
echo $dt->addYear();      
 $date = '2016-10-25';

    $start1 = \Carbon\Carbon::parse($date)->subDays('5'); // Gives 2016-10-20
    $start2 = \Carbon\Carbon::parse($date)->addMonths('3')->subDays('5');
        
    }
   public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $abalats= DB::table('abalats')->where('code','like','%'.$search.'%')->paginate(10);
        //dd($materials);
        return view('members.abalatdisplay1')->withAbalats($abalats);
    }
    public function register()
    {
        return view('members.abalatregister1');
    }

      public function store(Request $request)
    {   
        // $messages = [
        //     'after'      => 'ዕለት ትውልዲ ዕለት ካብ ዝተመልመለሉ ዕለት ክቕድም ኣለዎ',
        //     'required' => ':attribute ብትኽክል ኣይኣተወን',
        //     'alpha' => ':attribute ፊደላት ጥራሕ ክኸውን ኣለዎ',
        //     'in' => ':attribute ካብቶም ዘለዉ መማረፅታት ክኸውን ኣለዎ',
        //     'ethiopian_date' => 'ዕለት: መዓልቲ/ወርሒ/ዓመተምህረት ክኸውን ኣለዎ',
        //     'digits' => 'ቑፅሪ ስልኪ 10 ድጂት ክኸውን ኣለዎ'

        // ];
        // // validate each attribute, $errors should be placed in the view
        // $validator = \Validator::make($request->all(),[
  
       
        $this->validate($request, [
            'code'=>'required',
            'name' => 'required',
            'fname'=>'required',
            'gfname' => 'required',
            'mname' =>'required',
            // 'image' =>'required|image|max:2048',
            'gender'=>'required|in:F,M',
            'rbirr' =>'required',
            'receipt'=>'required',
            'bank' =>'required',
            'werasi' =>'required',
            'idnum' =>'required',
            'idgiven'=>'required',
            'dob' => 'required',
            'type' => 'required',
            'wereda' => 'required',            
            'town' => 'required',
            'qebelie' => 'required',
            'phone' => 'required', 
            'occupation' => 'required',  
            'child' =>'required',
                                
            // 'tell' => 'digits:10',
            'edulevel' =>'required|in:KG,1,2,3,4,5,6,7,8,9,10,11,12,certificate,diploma,degree,master,PHD,uneducated',
            //'account' =>,
            'numfe' =>'required',
            'nummale' =>'required',
            //'total' =>'required',
            'entrydate' =>'required',
        ]);
              $abalat1 = Abalat::count();
        $nubrow = $abalat1 + 1;
         if ($nubrow < 10) {
              $abalat_id = "0000".$nubrow;
          } 
            elseif ($nubrow >= 10 && $nubrow <=99) {
              $abalat_id = "000".$nubrow;
          } 
           elseif ($nubrow >= 100 && $nubrow <=999) {
              $abalat_id = "00".$nubrow;
          } 
           elseif ($nubrow >= 1000 && $nubrow <=9999) {
              $abalat_id = "0".$nubrow;
          } 
           elseif ($nubrow >= 10000 && $nubrow <=99999) {
              $abalat_id = $nubrow;
          } 
        $abalat = new Abalat;
        $abalat->code=$abalat_id;
        $abalat->id = $request->code;
        $abalat->name = $request->name;
        $abalat->fname=$request->fname;
        $abalat->gfname=$request->gfname;
        $abalat->mname=$request->mname;
          if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.'.$extension;
            $file->move('uploads/members/',$filename);
            $abalat->image = $filename;
            # code...
        }
        $abalat->gender=$request->gender;
        $abalat->rbirr = $request->rbirr;
        $abalat->receipt = $request->receipt;
        $abalat->bank = $request->bank;
        $abalat->werasi = $request->werasi;

        $abalat->idnum = $request->idnum;
        
         $entry2 = $request->idgiven;
         $timestamp = DateConvert::toEthiopian($entry2);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate3=$year."-".$month."-".$date;
        $abalat->idgiven = $entrydate3;
       $entry1 = $request->dob;
         $timestamp = DateConvert::toEthiopian($entry1);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate2=$year."-".$month."-".$date;
        $abalat->dob = $entrydate2;
        $abalat->type = $request->type;
        $abalat->wereda = $request->wereda;
        $abalat->town = $request->town;

        $abalat->qebelie = $request->qebelie;
        $abalat->phone = $request->phone;
        $abalat->occupation = $request->occupation;
        $abalat->child = $request->child;
       
        $abalat->edulevel = $request->edulevel;
       

        $abalat->numfe = $request->numfe;
        $abalat->nummale = $request->nummale;

         $x=$abalat->numfe;
        $y=$abalat->nummale;
        $abalat->total = $x+$y;

        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalat->entrydates=$entrydate1;
       $entry3 = $request->leavedate;
       if ($entry3 == null) {
          $abalat->leavedate=$request->leavedate;
       }
       else{
         $timestamp = DateConvert::toEthiopian($entry3);
       
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate4=$year."-".$month."-".$date;
        $abalat->leavedate=$entrydate4;
       }
        $abalat->idea = $request->idea;

        $abalat->save();
        
        // auth()->login($abalat);
        
        return redirect()->to('/listofmembers1')->with('success','successfully registered with account number '.$abalat_id);

    }
    public function edit($id){
        $abalats = Abalat::find($id);
        return view('members.edit1')->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
          $abalat1 = Abalat::count();
        $nubrow = $abalat1 + 1;
         if ($nubrow < 10) {
              $abalat_id = "0000".$nubrow;
          } 
            elseif ($nubrow >= 10 && $nubrow <=99) {
              $abalat_id = "000".$nubrow;
          } 
           elseif ($nubrow >= 100 && $nubrow <=999) {
              $abalat_id = "00".$nubrow;
          } 
           elseif ($nubrow >= 1000 && $nubrow <=9999) {
              $abalat_id = "0".$nubrow;
          } 
           elseif ($nubrow >= 10000 && $nubrow <=99999) {
              $abalat_id = $nubrow;
          } 
         $abalat = Abalat::find($request->id);
                $abalat->id = $request->code;


        $abalat->name = $request->name;
        $abalat->fname=$request->fname;
        $abalat->gfname=$request->gfname;
        $abalat->mname=$request->mname;
        
        $image_name = $request->image;
        $image = $request->file('image');
        $image_name=rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/members'),$image_name);
        $abalat->image = $image_name;
        $abalat->gender=$request->gender;
        $abalat->rbirr = $request->rbirr;
        $abalat->receipt = $request->receipt;
        $abalat->bank = $request->bank;
        $abalat->werasi = $request->werasi;

        $abalat->idnum = $request->idnum;

         $entry2 = $request->idgiven;
         $timestamp = DateConvert::toEthiopian($entry2);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate3=$year."-".$month."-".$date;
        $abalat->idgiven = $entrydate3;

        $entry1 = $request->dob;
         $timestamp = DateConvert::toEthiopian($entry1);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate2=$year."-".$month."-".$date;
        $abalat->dob = $entrydate2;
        $abalat->type = $request->type;
        $abalat->wereda = $request->wereda;
        $abalat->town = $request->town;

        $abalat->qebelie = $request->qebelie;
        $abalat->phone = $request->phone;
        $abalat->occupation = $request->occupation;
        $abalat->child = $request->child;
       
        $abalat->edulevel = $request->edulevel;
        

        $abalat->numfe = $request->numfe;
        $abalat->nummale = $request->nummale;

         $x=$abalat->numfe;
        $y=$abalat->nummale;
        $abalat->total = $x+$y;

        $entry = $request->entrydate;
         $timestamp = DateConvert::toEthiopian($entry);
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalat->entrydates=$entrydate1;
        
       $entry3 = $request->leavedate;
        if ($entry3 == null) {
          $abalat->leavedate=$request->leavedate;
       }
       else{
         $timestamp = DateConvert::toEthiopian($entry3);
       
        
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate4=$year."-".$month."-".$date;
        $abalat->leavedate=$entrydate4;
       }
        $abalat->idea = $request->idea;
           $abalat->save();
        
        // auth()->login($abalat);
        
        return redirect()->to('/listofmembers1')->with('success','successfully updated');
    }

   
    public function destroy($id)
    {
     $abalat = Abalat::find($id);
     $abalat->delete();
     return redirect('/listofmembers1')->with('success','Data deleted!');
    }
    public function report()
    {
        $totalreport = Abalat::count();
       $malereport = Abalat::where('gender','M')->count();
       $femalereport = Abalat::where('gender','F')->count();
       $childreport = Abalat::where('child','child')->count();
       $maturereport = Abalat::where('child','mature')->count();
       $monthlyreport = MonthlySaving::count();
       $childrenreport = ChildrenSaving::count();
       $voluntaryreport = VoluntarySaving::count();
       $timelimitreport = TimeLimitedSaving::count();
        $investmentreport = InvestmentSaving::count();
         $freeinterestreport = FreeInterestSaving::count();
         return view('home')->withTotalreport($totalreport)->withMalereport($malereport)->withFemalereport($femalereport)->withChildreport($childreport)->withMaturereport($maturereport)->withMonthlyreport($monthlyreport)->withChildrenreport($childrenreport)->withVoluntaryreport($voluntaryreport)->withTimelimitreport($timelimitreport)->withInvestmentreport($investmentreport)->withFreeinterestreport($freeinterestreport);
       
    }

}
