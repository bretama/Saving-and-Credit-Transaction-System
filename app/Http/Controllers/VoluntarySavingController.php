<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Abalat;
use App\VoluntarySaving;
use App\DateConvert;
use DB;
use Carbon\Carbon;
use Auth;
class VoluntarySavingController extends Controller
{
     public function index()
    {
      $abalvoluntary = DB::table('abalats')
    ->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->get(); 
        $abalats = Abalat::all();


              $today11 = date('Y-m-d');
        $timestamp11 = DateConvert:: toEthiopian($today11);
         $entrydate11 = explode("/", $timestamp11);
        $year = $entrydate11[2];
        $month = $entrydate11[1];
        $date = $entrydate11[0];
        
          $entrydate11=$year."-".$month."-".$date;

    $today111= Carbon::now()->subMonths(7);

    $timestamp111 = DateConvert:: toEthiopian($today111);
         $entrydate111 = explode("/", $timestamp111);
        $year = $entrydate111[2];
        $month = $entrydate111[1];
        $date = $entrydate111[0];
        
          $entrydate111=$year."-".$month."-".$date;

        $voluntarysaving = VoluntarySaving::orderBy('accountNum', 'ASC')->where('deleted_at','=',NULL)->where('entrydate','<',$entrydate111)->get();

     return view('register.voluntarydisplay')->withAbalats($abalats)->withVoluntarysaving($voluntarysaving)->withAbalvoluntary($abalvoluntary);
    }
        public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $voluntarysaving= DB::table('voluntary_savings')->where('accountNum','like','%'.$search.'%')->paginate(10);
        //dd($materials);
        return view('register.voluntarydisplay')->withVoluntarysaving($voluntarysaving);
    }
    public function register()
    {
      $abalats = Abalat::all();
        return view('register.voluntaryregister')->withAbalats($abalats);
    }
     public function store(Request $request){
      $this->validate($request, [
           'code'=>'required',
            'amount'=>'required',
            'bank'=>'required',
            // 'sem1' => 'required',
            'month' => 'required',
            'entrydate'=>'required',
      ]);
         $voluntary = new voluntarySaving;
          $roles = DB::table('voluntary_savings')->select('id', 'interest','interestdate','amount')->get();
     foreach ($roles as $user) {
          $entry = $user->interestdate;
         $entry = strtotime($entry);
         $today = date('Y-m-d');
         $timestamp = DateConvert:: toEthiopian($today);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $today = strtotime($entrydate1);
         $ndays = ($today-$entry)/86400;
         if ($ndays<=0) {
           $interest = 0;
         }
         else{
          $interest = ( $user->amount * $ndays*0.08)/365.25;
        }
         DB::table('voluntary_savings')
            ->where('id', $user->id)
            ->update(['interest' => $interest]);
}
        $x=$request->amount;
        $username=Auth::user()->name;
        $voluntary->username = $username;
        $voluntary->accountNum = $request->code;
         $voluntary->amount = $request->amount;
         $voluntary->bank =$request->bank;
         // $voluntary->recipt = $request->recipt;
         $voluntary->sem1 = $request->sem1;
         $voluntary->month = $request->month;
         $entry = $request->entrydate;
          $timestamp = DateConvert::toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
        $voluntary->entrydate=$entrydate1;

        $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydates=$year."-".$month."-".$date;
        $voluntary->interestdate = $entrydates; 

        $entrydates=strtotime($entrydates);
        $today = date('Y-m-d');
        $today = DateConvert::toEthiopian($today);
        $entrydate = explode("/", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       $today=$year."-".$month."-".$date;
        $today = strtotime($today);
        $ndays = ($today-$entrydates)/86400;
        
     if ($ndays<=0) {
          $voluntary->interest = 0;
        }
        else{
          $interest = $request->amount * $ndays*0.0001916495551;
          $voluntary->interest = $interest;
        }
        
      $voluntary->save();
      return redirect()->to('/voluntarydisplay')->with('success','successfully added!');
        }
     public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = VoluntarySaving::find($id);
      return view('register.editvoluntary')->withEdit($edit)->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
       $voluntary = VoluntarySaving::find($request->id);
                 $roles = DB::table('voluntary_savings')->select('id', 'interest','interestdate','amount')->get();
     foreach ($roles as $user) {
          $entry = $user->interestdate;
         $entry = strtotime($entry);
         $today = date('Y-m-d');
         $timestamp = DateConvert:: toEthiopian($today);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $today = strtotime($entrydate1);
         $ndays = ($today-$entry)/86400;
         if($ndays<=0){
            $interest=0;
          }
          else{
          $interest = ( $user->amount * $ndays*0.08)/365.25;
           }
         DB::table('monthly_savings')
            ->where('id', $user->id)
            ->update(['interest' => $interest]);
}
        // $username=Auth::user()->name;
        // $voluntary->username = $username;
        $voluntary->accountNum = $request->code;
         $voluntary->amount = $request->amount;
         $voluntary->bank =$request->bank;
         // $voluntary->recipt = $request->recipt;
         $voluntary->sem1 = $request->sem1;
         $voluntary->month = $request->month;
         $entry = $request->entrydate;
        $timestamp = DateConvert::toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
        $voluntary->entrydate=$entrydate1;
        $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydates=$year."-".$month."-".$date;
        $voluntary->interestdate = $entrydates; 
        $entrydates=strtotime($entrydates);
          $today = date('Y-m-d');
          $today =DateConvert::toEthiopian($today);
          $entrydate = explode("/", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       $today=$year."-".$month."-".$date;
        $today = strtotime($today);
        $ndays = ($today-$entrydates)/86400;
       
        if ($ndays<=0) {
          $voluntary->interest = 0;
        }
        else{
           $interest = $request->amount * $ndays*0.0001916495551;
          $voluntary->interest = $interest;
        }
      $voluntary->save();
      return redirect()->to('/voluntarydisplay')->with('success','updated');
}
public function destroy($id)
    {
     $voluntary = VoluntarySaving::find($id);
     $voluntary->delete();
     return redirect('/voluntarydisplay')->with('success','deleted!');
    }
}