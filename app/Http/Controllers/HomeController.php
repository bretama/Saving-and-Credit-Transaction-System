<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Abalat;

use DB;
use App\DateConvert;

use App\MonthlySaving;
use App\ChildrenSaving;
use App\TimeLimitedSaving;
use App\VoluntarySaving;
use App\InvestmentSaving;
use App\FreeInterestSaving;
use Carbon\Carbon;
use DateTime;
use Yajra\DataTables\DataTables;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
     public function index()
    {
      $childrens=0;
      $mature=0;
      $elder=0;

         $roles = DB::table('abalats')->select('dob')->get();

     foreach ($roles as $user) {
          $entry1 = $user->dob;
         $entry = strtotime($entry1);
        
         $today = date('Y-m-d');
         $timestamp = DateConvert:: toEthiopian($today);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $today = strtotime($entrydate1);

         $ndays = ((($today-$entry)/31557600)-7.68446);
    
          if($ndays>40){
            $childrens++;

            
          }
          elseif($ndays>18 && $ndays<=40){
            $mature++;

          }
          else{
          $elder++;
           }
       
}

        $totalreport = Abalat::orderBy('code', 'desc')->where('deleted_at','=',NULL)->count();
       $malereport = Abalat::where('gender','M')->where('deleted_at','=',NULL)->count();
       $femalereport = Abalat::where('gender','F')->where('deleted_at','=',NULL)->count();
       $childreport = Abalat::where('child','child')->where('deleted_at','=',NULL)->count();
       $maturereport = Abalat::where('child','mature')->where('deleted_at','=',NULL)->count();
       $monthlyreport = MonthlySaving::where('deleted_at','=',NULL)->distinct('accountNum')->count();
       $childrenreport = ChildrenSaving::where('deleted_at','=',NULL)->distinct('accountNum')->count();
       $voluntaryreport = VoluntarySaving::orderBy('accountNum', 'desc')->where('deleted_at','=',NULL)->distinct('accountNum')->count();
       $timelimitreport = TimeLimitedSaving::orderBy('accountNum', 'desc')->where('deleted_at','=',NULL)->distinct('accountNum')->count();
        $investmentreport = InvestmentSaving::orderBy('accountNum', 'desc')->where('deleted_at','=',NULL)->distinct('accountNum')->count();
         $freeinterestreport = FreeInterestSaving::orderBy('accountNum', 'desc')->where('deleted_at','=',NULL)->distinct('accountNum')->count();
         return view('home')->withTotalreport($totalreport)->withMalereport($malereport)->withFemalereport($femalereport)->withChildreport($childreport)->withMaturereport($maturereport)->withMonthlyreport($monthlyreport)->withChildrenreport($childrenreport)->withVoluntaryreport($voluntaryreport)->withTimelimitreport($timelimitreport)->withInvestmentreport($investmentreport)->withFreeinterestreport($freeinterestreport)->withChildrens($childrens)->withMature($mature)->withElder($elder);
       
    }
    public function month()
    {
        $today1 = date('Y-m-d');
        $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;

         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);



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
        // $monthlysaving = MonthlySaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
       $monthlysaving = MonthlySaving::orderBy('accountNum', 'desc')->where('entrydate','>=',$entrydate11)->where('deleted_at','=',NULL)->get();
         $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
  
     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
    public function monthreg()
    {
        $abalats = Abalat::all();
        return view('register.registermonth')->withAbalats($abalats);
    }

    public function aboveone()
    {
         // $n = (int)$n;
        $today1 = date('Y-m-d');
        $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;

         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);
        // $monthlysaving = MonthlySaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
       $monthlysaving = MonthlySaving::orderBy('accountNum', 'ASC')->where('deleted_at','=',NULL)->where('accountNum','<=',00200)->get();
         $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
    //dd($abalmonth);
     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
    public function abovetwo()
    {
        $today1 = date('Y-m-d');
        $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;

         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);
        // $monthlysaving = MonthlySaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
       $monthlysaving = MonthlySaving::orderBy('accountNum', 'ASC')->where('entrydate','>=',$entrydate11)->where('deleted_at','=',NULL)->where('accountNum','<=',00400)->where('accountNum','>',00200)->get();
         $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
    //dd($abalmonth);
     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
    public function abovethree()
    {
        $today1 = date('Y-m-d');
        $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;

         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);
        // $monthlysaving = MonthlySaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
       $monthlysaving = MonthlySaving::orderBy('accountNum', 'ASC')->where('entrydate','>=',$entrydate11)->where('deleted_at','=',NULL)->where('accountNum','<=',00600)->where('accountNum','>',00400)->get();
         $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
    //dd($abalmonth);
     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
    public function abovefour()
    {
        $today1 = date('Y-m-d');
        $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;

         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);
        // $monthlysaving = MonthlySaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
       $monthlysaving = MonthlySaving::orderBy('accountNum', 'ASC')->where('entrydate','>=',$entrydate11)->where('deleted_at','=',NULL)->where('accountNum','<=',01000)->where('accountNum','>',00600)->get();
         $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
    //dd($abalmonth);
     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
    public function abovefive()
    {
        $today1 = date('Y-m-d');
        $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;

         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);
        // $monthlysaving = MonthlySaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
       $monthlysaving = MonthlySaving::orderBy('accountNum', 'ASC')->where('entrydate','>=',$entrydate11)->where('deleted_at','=',NULL)->where('accountNum','<=',01200)->where('accountNum','>',01000)->get();
         $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
    //dd($abalmonth);
     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
     public function abovesix()
    {
        $today1 = date('Y-m-d');
        $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;

         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);
        // $monthlysaving = MonthlySaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
       $monthlysaving = MonthlySaving::orderBy('accountNum', 'ASC')->where('entrydate','>=',$entrydate11)->where('deleted_at','=',NULL)->where('accountNum','<=',01400)->where('accountNum','>',01200)->get();
         $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
    //dd($abalmonth);
     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
     public function aboveseven()
    {
        $today1 = date('Y-m-d');
        $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;

         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);
        // $monthlysaving = MonthlySaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
       $monthlysaving = MonthlySaving::orderBy('accountNum', 'ASC')->where('entrydate','>=',$entrydate11)->where('deleted_at','=',NULL)->where('accountNum','<=',01600)->where('accountNum','>',01400)->get();
         $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
    //dd($abalmonth);
     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
    public function aboveeight()
    {
        $today1 = date('Y-m-d');
        $today1= Carbon::now()->subMonths(6);
        $timestamp = DateConvert::toEthiopian($today1);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate11=$year."-".$month."-".$date;

         $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::all()->where('created_at','>=',$entrydate1);
        // $monthlysaving = MonthlySaving::orderBy('CREATED_AT', 'desc')->where('deleted_at','=',NULL)->get();
       $monthlysaving = MonthlySaving::orderBy('accountNum', 'ASC')->where('entrydate','>=',$entrydate11)->where('deleted_at','=',NULL)->where('month','=','Auguest')->get();
         $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
    //dd($abalmonth);
     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
}
