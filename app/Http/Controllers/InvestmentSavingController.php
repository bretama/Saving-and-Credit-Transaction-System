<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Abalat;
use App\InvestmentSaving;
use App\DateConvert;
use DB;
use Carbon\Carbon;
use Auth;
class InvestmentSavingController extends Controller
{
    public function index()
    {
        $abalats = Abalat::all();
        $investmentsaving = InvestmentSaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
     return view('register.investmentdisplay')->withAbalats($abalats)->withInvestmentsaving($investmentsaving);
    }
        public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $investmentsaving= DB::table('investment_savings')->where('accountNum','like','%'.$search.'%')->where('deleted_at','=',NULL)->get();
        //dd($materials);
        return view('register.investmentdisplay')->withInvestmentsaving($investmentsaving);
    }
    public function register()
    {
      $abalats = Abalat::all();
        return view('register.investmentregister')->withAbalats($abalats);
    }
     public function store(Request $request){
      $this->validate($request, [
           'code'=>'required',
            'amount'=>'required',
            'bank'=>'required',
            // 'sem1' => 'required',
            'month' => 'required',
            'entrydate'=>'required'
      ]);
         $investment = new InvestmentSaving;
         $roles = DB::table('investment_savings')->select('id', 'interest','interestdate','amount')->get();
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
        $x=$request->amount;
        $username=Auth::user()->name;
        $investment->username = $username;
        $investment->accountNum = $request->code;
         $investment->amount = $request->amount;
         $investment->bank =$request->bank;
         $investment->recipt = $request->recipt;
         $investment->sem1 = $request->sem1;
         $investment->month = $request->month;
         $entry = $request->entrydate;
         //$today= Carbon::now()->subMonths(1);
          $timestamp = DateConvert::toEthiopian($entry); 
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         $entrydate1=$year."-".$month."-".$date;
        $investment->entrydate=$entrydate1;

       $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydates=$year."-".$month."-".$date;
        $investment->interestdate = $entrydates;
        $entrydates=strtotime($entrydates);
       //todays time
    $today = date('Y-m-d');

    $today = DateConvert::toEthiopian($today);

    $entrydate = explode("/", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       $today=$year."/".$month."/".$date;
        $today = strtotime($today);
        $ndays = ($today-$entrydates)/86400;
        if ($ndays<=0) {
            $investment->interest=0;
        }
        else{
        $interest = $request->amount * $ndays*0.0001916495551;
        $investment->interest = $interest;
    }
      $investment->save();
      return redirect()->to('/investmentdisplay')->with('success','saved successfully!');
    }
   public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = InvestmentSaving::find($id);
      return view('register.editinvestment')->withEdit($edit)->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
      // $last = DB::table('monthly_savings')->select('amount')->where('code',$request->code)->latest()->first();
      //  $last = $last->amount;

         $investment = InvestmentSaving::find($request->id);
          $roles = DB::table('investment_savings')->select('id', 'interest','interestdate','amount')->get();
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
        $x=$request->amount;
        // $username=Auth::user()->name;
        // $investment->username = $username;
         $investment->accountNum = $request->code;
         $investment->amount = $request->amount;
          $investment->bank =$request->bank;
          $investment->recipt = $request->recipt;
         $investment->sem1 = $request->sem1;
         $investment->month = $request->month;
         $entry = $request->entrydate;
          $timestamp = DateConvert::toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $investment->entrydate=$entrydate1;

        $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydates=$year."-".$month."-".$date;
        $investment->interestdate = $entrydates;
        
        $entrydates=strtotime($entrydates);
       //todays time
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
            $investment->interest=0;
        }
        else{
        $interest = $request->amount * $ndays*0.0001916495551;
        $investment->interest = $interest;
    }
      $investment->save();
      return redirect()->to('/investmentdisplay')->with('success','successfully updated!');
        }
      
 public function destroy($id)
    {
     $monthly = InvestmentSaving::find($id);
     $monthly->delete();
     return redirect('/investmentdisplay')->with('success','data deleted!!');
    }
}