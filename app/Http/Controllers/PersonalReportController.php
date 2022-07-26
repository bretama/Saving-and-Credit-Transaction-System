<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MonthlySaving;
use App\Abalat;
use App\InvestmentSaving;
use App\FreeInterestSaving;
use App\VoluntarySaving;
use App\TimeLimitedSaving;
use App\Water;
use App\TeaCoffee;
use App\Submember;
use App\Payment;
use App\Penality;
use App\Normalcredit;
use App\ReturnNormal;
use App\Abel;
use App\Comission;
use App\AdditionalExpense;
use DB;
use App\DateConvert;
use Carbon\Carbon;
use App\ChildrenSaving;
class PersonalReportController extends Controller
{   
public function index1()
    {

        return view('report.intervalreport');
    }
    public function index11()
    {

        return view('report.notsavedform');
    }
 public function index111()
    {

        return view('report.totalreport');
    }

    public function register11(Request $request){
        $entrydate1 = $request->firstdate;
        $entrydate11 = $request->lastdate;
        $amount1 = $request->amount;

        $abalmonth = DB::table('abalats')
       ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)
        ->where('entrydate','<=',$entrydate11)->orderBy('abalats.name', 'ASC')
        ->where('monthly_savings.deleted_at',NULL)->where('abalats.deleted_at',NULL)->where('monthly_savings.amount','>=',$amount1)->get();
        

        //  'abalats.code', '=', 'monthly_savings.accountNum')
        // ->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)
        // ->orderBy('monthly_savings.accountNum', 'ASC')
        // ->where('monthly_savings.deleted_at',NULL)->where('m')->get();

       // $abalatall=DB::table('abalats')->get();
        return view('report.notsaved')->withAbalmonth($abalmonth);

    }

     public function register111(Request $request){
        $entrydate1 = $request->firstdate;

        //  $timestamp = DateConvert:: toEthiopian($entry);
        //  $entrydate = explode("/", $timestamp);
        // $year = $entrydate[2];
        // $month = $entrydate[1];
        // $date = $entrydate[0];
        // $entrydate1=$year."-".$month."-".$date;
   
        $entrydate11 = $request->lastdate;
        //  $timestamp1 = DateConvert:: toEthiopian($entry1);
        //  $entrydate2 = explode("/", $timestamp1);
        // $year1= $entrydate2[2];
        // $month1 = $entrydate2[1];
        // $date1 = $entrydate2[0];
        // $entrydate11=$year1."-".$month1."-".$date1;
       
 
     $abalat = DB::table('abalats')
    ->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->orderBy('code', 'ASC')->where('deleted_at',NULL)->get();
    $abalatsumpermonth = DB::table('abalats')
    ->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->orderBy('code', 'ASC')->where('deleted_at',NULL)->count();

        $feesum = DB::table('abalats')
    ->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at',NULL)->orderBy('code', 'ASC')->sum('rbirr');

     $monthlyadmi = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at',NULL)->sum('sem1');
  $monthlyinterest = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at',NULL)->sum('interest');



 $abalmonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('monthly_savings.accountNum', 'ASC')->where('monthly_savings.deleted_at',NULL)->get();

   $abalpenality = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('penalities.accountNum', 'ASC')->where('penalities.deleted_at',NULL)->get();

    $abalpenalitycount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('penalities.accountNum', 'ASC')->where('penalities.deleted_at',NULL)->count();


     $abalpenalityamount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('penalities.accountNum', 'ASC')->where('penalities.deleted_at',NULL)->sum('penality');

    


   $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->count();  
  


   $monthlymale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->count();

     $monthlyfemale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->count();

     $abalatfemale = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at','=',NULL)->where('gender','=','F')->count();
      $abalatmale = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at','=',NULL)->where('gender','=','M')->count();
      $child = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at','=',NULL)->where('child','=','child')->count();

   $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->distinct('monthly_savings.accountNum')->where('monthly_savings.deleted_at','=',NULL)->count();
   
    $voluntary = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('voluntary_savings.accountNum', 'ASC')->where('voluntary_savings.deleted_at','=',NULL)->get();

           $investment = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('investment_savings.accountNum', 'ASC')->where('investment_savings.deleted_at','=',NULL)->get(); 

             $children = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('children_savings.accountNum', 'ASC')->where('children_savings.deleted_at','=',NULL)->get();

               $share = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('shares.accountNum', 'ASC')->where('shares.deleted_at','=',NULL)->get();


                $monthlyamount = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('amount'); 
                $monthlyamount1 = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('interest');

                 $monthlyshare = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('share'); 

                  $monthlysaving = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('saving');

                   // $monthlypenality = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->join('penalities','abalats.code','=','penalities.accountNum')->where('penalities.month','=','Auguest')->sum('penality');  


                $voluntaryamount = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('voluntary_savings.deleted_at','=',NULL)->sum('amount');

                 $voluntaryamount1 = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('voluntary_savings.deleted_at','=',NULL)->sum('interest');
                //

            $freeinterestamount = DB::table('abalats')->join('free_interest_savings', 'abalats.code', '=', 'free_interest_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('free_interest_savings.deleted_at','=',NULL)->sum('amount');

            $timelimitamount = DB::table('abalats')->join('time_limited_savings', 'abalats.code', '=', 'time_limited_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('time_limited_savings.deleted_at','=',NULL)->sum('amount');
            $timelimitamount1 = DB::table('abalats')->join('time_limited_savings', 'abalats.code', '=', 'time_limited_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('time_limited_savings.deleted_at','=',NULL)->sum('interest');
                //

               $investmentamount = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('investment_savings.deleted_at','=',NULL)->sum('amount');

               $investmentamount1 = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('investment_savings.deleted_at','=',NULL)->sum('interest');
                
                $childrenamount = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->sum('amount');

                 $childrenamount1 = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->sum('interest');
                $shareamount = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('shares.deleted_at','=',NULL)->sum('amount');

                $monthlysem1 = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('monthly_savings.sem1','=',NULL)->get();
              

              $childrensem1 = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('entrydate','>=',$entrydate1)->where('children_savings.sem1','=',NULL)->where('entrydate','<=',$entrydate11)->get();

     /// abzi werhi zatewu trah save zgeberwo------
$monthlyamountthismonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('amount');

$monthlyamountthismonthf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','F')->sum('amount');
$monthlyamountthismonthm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->sum('amount');


$monthlycountthismonthm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->where('monthly_savings.deleted_at','=',NULL)->count();
$monthlycountthismonthf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('abalats.entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->where('monthly_savings.deleted_at','=',NULL)->count();


                 $monthlysharethismonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('share'); 



                  $monthlysharethismonthf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('gender','=','F')->sum('share'); 
                  $monthlysharethismonthm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('gender','=','M')->sum('share'); 

                  $monthlysavingthismonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('saving');

                  $monthlysavingthismonthf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','F')->sum('saving');

                  $monthlysavingthismonthm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->sum('saving');
                  $monthlysavingthismonthfee = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('deleted_at','=',NULL)->where('entrydates','<=',$entrydate11)->sum('rbirr');
                  ///total amount saving share each gender saves

                 $monthlysharem = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('abalats.gender','=','M')->where('monthly_savings.deleted_at','=',NULL)->sum('share'); 

                   $monthlysharef = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('abalats.gender','=','F')->where('monthly_savings.deleted_at','=',NULL)->sum('share'); 

                  $monthlysavingm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('abalats.gender','=','M')->where('monthly_savings.deleted_at','=',NULL)->sum('saving');

                  $monthlysavingf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('abalats.gender','=','F')->where('monthly_savings.deleted_at','=',NULL)->sum('saving');

                  $monthlyabalatsf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->where('monthly_savings.deleted_at','=',NULL)->count();
                   $monthlyabalatsm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->where('monthly_savings.deleted_at','=',NULL)->count();


 $childrencountthismonthm = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at','=',NULL)->where('child','=','child')->where('abalats.gender','=','M')->count();
 $childrencountthismonthf = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at','=',NULL)->where('child','=','child')->where('abalats.gender','=','F')->count();
// $childrencountthismonthm = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->distinct('children_savings.accountNum')->where('abalats.gender','=','M')->where('children_savings.deleted_at','=',NULL)->count();

// $childrencountthismonthf = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->distinct('children_savings.accountNum')->where('abalats.gender','=','F')->where('children_savings.deleted_at','=',NULL)->count();


 $childrensharethismonthf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('gender','=','F')->where('abalats.child','=','child')->sum('share'); 

$childrensharethismonthm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('gender','=','M')->where('abalats.child','=','child')->sum('share'); 

$childrensavingthismonthf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','F')->where('abalats.child','=','child')->sum('saving');

 $childrensavingthismonthm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->where('abalats.child','=','child')->sum('saving');

$childrensavingthismonthfee = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('deleted_at','=',NULL)->where('entrydates','<=',$entrydate11)->where('abalats.child','=','child')->sum('rbirr');
 $childrensharem = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->where('abalats.child','=','child')->sum('share'); 

    $childrensavingm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->where('abalats.child','=','child')->sum('saving');
     $childrensharef = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','F')->where('abalats.child','=','child')->sum('share'); 

                  $childrensavingf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','F')->where('abalats.child','=','child')->sum('saving');

                  $childrencountf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','F')->where('abalats.child','=','child')->count();

                  $childrencountf1 = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('children_savings.deleted_at','=',NULL)->where('abalats.gender','=','F')->count();
                  $childrencountm1 = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('children_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->count();

                  $childrencountm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->where('abalats.child','=','child')->count();

                  
  // $children = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('children_savings.accountNum', 'ASC')->where('children_savings.deleted_at','=',NULL)->count();

  $childrenamountthismonthf = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('children_savings.entrydate','>=',$entrydate1)->where('children_savings.entrydate','<=',$entrydate11)->where('abalats.entrydates','>=',$entrydate1)->where('abalats.entrydates','<=',$entrydate11)->where('abalats.gender','=','F')->sum('amount');

  $childrenamountthismonthfem = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('children_savings.entrydate','>=',$entrydate1)->where('children_savings.entrydate','<=',$entrydate11)->where('abalats.gender','=','F')->sum('amount');

  $childrenamountthismonthm = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('children_savings.entrydate','>=',$entrydate1)->where('children_savings.entrydate','<=',$entrydate11)->where('abalats.entrydates','>=',$entrydate1)->where('abalats.entrydates','<=',$entrydate11)->where('abalats.gender','=','M')->sum('amount');

  $childrenamountthismonthmale = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('children_savings.entrydate','>=',$entrydate1)->where('children_savings.entrydate','<=',$entrydate11)->where('abalats.gender','=','M')->sum('amount');

   $childrentillnowm = DB::table('abalats')->where('deleted_at','=',NULL)->where('child','=','child')->where('abalats.gender','=','M')->count();
   $childrentillnowf = DB::table('abalats')->where('deleted_at','=',NULL)->where('child','=','child')->where('abalats.gender','=','F')->count();

 $childrensharetillnowm = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->where('abalats.child','=','child')->sum('share');
  $childrensharetillnowf = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','F')->where('abalats.child','=','child')->sum('share');

  $childrenamounttillnowf1 = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','F')->where('abalats.child','=','child')->sum('amount');
   $childrenamounttillnowm1 = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->where('abalats.child','=','child')->sum('amount');

    $childrenamounttillnowm2 = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('abalats.gender','=','m')->sum('amount');

  $childrenamounttillnowf2 = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('abalats.gender','=','M')->sum('amount');


//children report this
 $childrenamountthismonthtotal = $childrenamountthismonthf + $childrenamountthismonthm;
 $childrensavingthismonthf = $childrensavingthismonthf + $childrenamountthismonthf;
 $childrenamountthismonthm = $childrenamountthismonthm + $childrenamountthismonthf;
 $childrencountthismonthtotal = $childrencountthismonthm + $childrencountthismonthf;
 $childrensharethismonth = $childrensharethismonthm + $childrensharethismonthf;
 $childrensavingthismonth = $childrensavingthismonthf + $childrensavingthismonthm;
$monthlysavingthismonthfee = $monthlysavingthismonthfee - $childrensavingthismonthfee;
// nebarat ksab hezi
$childrentillnowm=$childrentillnowm-$childrencountthismonthm;
$childrentillnowf = $childrentillnowf-$childrencountthismonthf;
   $totalchildrentillnow = $childrentillnowf + $childrentillnowm;
   $childrensharetillnowm = $childrensharetillnowm - $childrensharethismonthm;
   $childrensharetillnowf = $childrensharetillnowf - $childrensharethismonthf;
   
   $totalchildrensharetillnow = $childrensharetillnowm +$childrensharetillnowf;
   $childrenamounttillnowf = $childrenamounttillnowf1 + $childrenamounttillnowf2-$childrenamountthismonthf;
    $childrenamounttillnowm = $childrenamounttillnowm1 + $childrenamounttillnowm2-$childrenamountthismonthm;
   $totalchildrenamounttillnow = $childrenamounttillnowm+ $childrenamounttillnowf;


$monthlysharem = $monthlysharem - $childrensharem;
$monthlysharef = $monthlysharef - $childrensharef;
$monthlysavingm = $monthlysavingm - $childrensavingm;
$monthlysavingf = $monthlysavingf - $childrensavingf;
$monthlyabalatsm = $monthlyabalatsm - $childrencountm;
$monthlyabalatsf = $monthlyabalatsf - $childrencountf;


$monthlysharelastm = $monthlysharem - $monthlysharethismonthm + $childrensharethismonthm;
$monthlysharelastf = $monthlysharef - $monthlysharethismonthf + $childrensharethismonthf;
$monnthlysavinglastm = $monthlysavingm - $monthlysavingthismonthm +$childrensavingthismonthm;
$monthlysavinglastf = $monthlysavingf - $monthlysavingthismonthf + $childrensavingthismonthf;

$monnthlycountlastm = $monthlyabalatsm - $monthlycountthismonthm + $childrencountthismonthm;
$monnthlycountlastf = $monthlyabalatsf - $monthlycountthismonthf + $childrencountthismonthf;

 $monthlysavinglast = $monnthlysavinglastm + $monnthlysavinglastm;
 $monthlysharelast =$monthlysharelastm + $monthlysharelastf;
 $monthlycountlast = $monnthlycountlastm + $monnthlycountlastf;
 //this month monthly
$monthlysharethismonthm = $monthlysharethismonthm - $childrensharethismonthm;
$monthlysharethismonthf = $monthlysharethismonthf - $childrensharethismonthf;
 $monthlysharethismonth = $monthlysharethismonthm + $monthlysharethismonthf;
 $monthlysavingthismonthm = $monthlysavingthismonthm - $childrensavingthismonthm;
 $monthlysavingthismonthf = $monthlysavingthismonthf - $childrensavingthismonthf;
 $monthlysavingthismonth = $monthlysavingthismonthm + $monthlysavingthismonthf;
 $monthlycountthismonthtotal = $monthlycountthismonthm + $monthlycountthismonthf;
 $monthlycountthismonthm = $monthlycountthismonthm - $childrencountthismonthm;
 $monthlycountthismonthf = $monthlycountthismonthf- $childrencountthismonthf;
 $monthlycountthismonthtotal = $monthlycountthismonthm + $monthlycountthismonthf;
 


$childrensharelastm = $childrensharem - $childrensharethismonthm;
$childrensharelastf = $childrensharef - $childrensharethismonthf;
$childrensavinglastm = $childrensavingm - $childrensavingthismonthm + $childrenamountthismonthmale - $childrenamountthismonthm;
$childrensavinglastf = $childrensavingf - $childrensavingthismonthf + $childrenamountthismonthfem - $childrenamountthismonthf;
$childrencountlastf = $childrencountf - $childrencountthismonthf + $childrencountf1;
$childrencountlastm = $childrencountm - $childrencountthismonthm + $childrencountm1;
$childrensharetotal = $childrensharelastm + $childrensharelastf;
$childrensavingtotal = $childrensavinglastm + $childrensavinglastf;
$childrencounttotal = $childrencountlastf + $childrencountlastm;




     $totalbirr=$feesum + $monthlyadmi + $abalpenalityamount + $monthlyamount + $voluntaryamount + $investmentamount + $childrenamount + $shareamount + $freeinterestamount + $timelimitamount; 
     $totalinterestbirr= $monthlyamount1 + $voluntaryamount1 + $investmentamount1 + $childrenamount1 + $timelimitamount1;

   return view('report.totalreportforeach')->withChildrensavingthismonth($childrensavingthismonth)->withChildrensavingthismonthf($childrensavingthismonthf)->withTotalchildrenamounttillnow($totalchildrenamounttillnow)->withTotalchildrensharetillnow($totalchildrensharetillnow)->withChildrenamounttillnowf($childrenamounttillnowf)->withChildrenamounttillnowm($childrenamounttillnowm)->withChildrensharetillnowm($childrensharetillnowm)->withChildrensharetillnowf($childrensharetillnowf)->withChildrentillnowm($childrentillnowm)->withChildrentillnowf($childrentillnowf)->withTotalchildrentillnow($totalchildrentillnow)->withChildrensavingthismonthm($childrensavingthismonthm)->withChildrensharetotal($childrensharetotal)->withChildrensavingtotal($childrensavingtotal)->withChildrencounttotal($childrencounttotal)->withChildrencountlastf($childrencountlastf)->withChildrencountlastm($childrencountlastm)->withChildrensavinglastm($childrensavinglastm)->withChildrensavinglastf($childrensavinglastf)->withChildrensharelastm($childrensharelastm)->withChildrensharelastf($childrensharelastf)->withChildrensavingthismonthfee($childrensavingthismonthfee)->withChildrensharethismonthm($childrensharethismonthm)->withChildrensharethismonthf($childrensharethismonthf)->withChildrensharethismonth($childrensharethismonth)->withChildrencountthismonthm($childrencountthismonthm)->withChildrencountthismonthf($childrencountthismonthf)->withChildrencountthismonthtotal($childrencountthismonthtotal)->withMonthlycountthismonthtotal($monthlycountthismonthtotal)->withMonthlysavingthismonthfee($monthlysavingthismonthfee)->withMonthlycountthismonthm($monthlycountthismonthm)->withMonthlycountthismonthf($monthlycountthismonthf)->withMonthlycountlast($monthlycountlast)->withMonthlysavinglast($monthlysavinglast)->withMonthlysharelast($monthlysharelast)->withMonthlysharelastm($monthlysharelastm)->withMonthlysharelastf($monthlysharelastf)->withMonnthlysavinglastm($monnthlysavinglastm)->withMonthlysavinglastf($monthlysavinglastf)->withMonnthlycountlastm($monnthlycountlastm)->withMonnthlycountlastf($monnthlycountlastf)->withMonthlyamountthismonth($monthlyamountthismonth)->withMonthlysharethismonth($monthlysharethismonth)->withMonthlysavingthismonth($monthlysavingthismonth)->withChildrensem1($childrensem1)->withMonthlysem1($monthlysem1)->withChild($child)->withAbalatfemale($abalatfemale)->withAbalatmale($abalatmale)->withAbalmonth($abalmonth)->withVoluntary($voluntary)->withInvestment($investment)->withChildren($children)->withShare($share)->withMonthlyamount($monthlyamount)->withMonthlysaving($monthlysaving)->withMonthlyshare($monthlyshare)->withVoluntaryamount($voluntaryamount)->withInvestmentamount($investmentamount)->withChildrenamount($childrenamount)->withShareamount($shareamount)->withMonthlyabalats($monthlyabalats)->withMonthlymale($monthlymale)->withMonthlyfemale($monthlyfemale)->withAbalpenality($abalpenality)->withAbalpenalitycount($abalpenalitycount)->withAbalpenalityamount($abalpenalityamount)->withAbalat($abalat)->withAbalatsumpermonth($abalatsumpermonth)->withFeesum($feesum)->withMonthlyadmi($monthlyadmi)->withMonthlyinterest($monthlyinterest)->withTotalbirr($totalbirr)->withTotalinterestbirr($totalinterestbirr);
    

    }

public function register1(Request $request){

    $entrydate1 = $request->firstdate;

        //  $timestamp = DateConvert:: toEthiopian($entry);
        //  $entrydate = explode("/", $timestamp);
        // $year = $entrydate[2];
        // $month = $entrydate[1];
        // $date = $entrydate[0];
        // $entrydate1=$year."-".$month."-".$date;
   
        $entrydate11 = $request->lastdate;
        //  $timestamp1 = DateConvert:: toEthiopian($entry1);
        //  $entrydate2 = explode("/", $timestamp1);
        // $year1= $entrydate2[2];
        // $month1 = $entrydate2[1];
        // $date1 = $entrydate2[0];
        // $entrydate11=$year1."-".$month1."-".$date1;
       
 
     $abalat = DB::table('abalats')
    ->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->orderBy('code', 'ASC')->where('deleted_at',NULL)->get();
    $abalatsumpermonth = DB::table('abalats')
    ->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->orderBy('code', 'ASC')->where('deleted_at',NULL)->count();

        $feesum = DB::table('abalats')
    ->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at',NULL)->orderBy('code', 'ASC')->sum('rbirr');

     $monthlyadmi = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at',NULL)->sum('sem1');
  $monthlyinterest = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at',NULL)->sum('interest');



 $abalmonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('monthly_savings.accountNum', 'ASC')->where('monthly_savings.deleted_at',NULL)->get();

   $abalpenality = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('penalities.accountNum', 'ASC')->where('penalities.deleted_at',NULL)->get();

    $abalpenalitycount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('penalities.accountNum', 'ASC')->where('penalities.deleted_at',NULL)->count();


     $abalpenalityamount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('penalities.accountNum', 'ASC')->where('penalities.deleted_at',NULL)->sum('penality');

    


   $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->count();  
  


   $monthlymale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->count();

     $monthlyfemale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->count();

     $abalatfemale = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at','=',NULL)->where('gender','=','F')->count();
      $abalatmale = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at','=',NULL)->where('gender','=','M')->count();
      $child = DB::table('abalats')->where('entrydates','>=',$entrydate1)->where('entrydates','<=',$entrydate11)->where('deleted_at','=',NULL)->where('child','=','child')->count();

   $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->distinct('monthly_savings.accountNum')->where('monthly_savings.deleted_at','=',NULL)->count();
   
    $voluntary = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('voluntary_savings.accountNum', 'ASC')->where('voluntary_savings.deleted_at','=',NULL)->get();

           $investment = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('investment_savings.accountNum', 'ASC')->where('investment_savings.deleted_at','=',NULL)->get(); 

             $children = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('children_savings.accountNum', 'ASC')->where('children_savings.deleted_at','=',NULL)->get();

               $share = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->orderBy('shares.accountNum', 'ASC')->where('shares.deleted_at','=',NULL)->get();


                $monthlyamount = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('amount'); 
                $monthlyamount1 = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('interest');

                 $monthlyshare = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('share'); 

                  $monthlysaving = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->sum('saving');

                   // $monthlypenality = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->join('penalities','abalats.code','=','penalities.accountNum')->where('penalities.month','=','Auguest')->sum('penality');  


                $voluntaryamount = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('voluntary_savings.deleted_at','=',NULL)->sum('amount');

                 $voluntaryamount1 = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('voluntary_savings.deleted_at','=',NULL)->sum('interest');
                //

            $freeinterestamount = DB::table('abalats')->join('free_interest_savings', 'abalats.code', '=', 'free_interest_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('free_interest_savings.deleted_at','=',NULL)->sum('amount');

            $timelimitamount = DB::table('abalats')->join('time_limited_savings', 'abalats.code', '=', 'time_limited_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('time_limited_savings.deleted_at','=',NULL)->sum('amount');
            $timelimitamount1 = DB::table('abalats')->join('time_limited_savings', 'abalats.code', '=', 'time_limited_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('time_limited_savings.deleted_at','=',NULL)->sum('interest');
                //

               $investmentamount = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('investment_savings.deleted_at','=',NULL)->sum('amount');

               $investmentamount1 = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('investment_savings.deleted_at','=',NULL)->sum('interest');
                
                $childrenamount = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->sum('amount');
                 $childrenamount1 = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->sum('interest');
                $shareamount = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('shares.deleted_at','=',NULL)->sum('amount');

                $monthlysem1 = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('entrydate','>=',$entrydate1)->where('entrydate','<=',$entrydate11)->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('monthly_savings.sem1','=',NULL)->get();
              

              $childrensem1 = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.deleted_at','=',NULL)->where('entrydate','>=',$entrydate1)->where('children_savings.sem1','=',NULL)->where('entrydate','<=',$entrydate11)->get();



     $totalbirr=$feesum + $monthlyadmi + $abalpenalityamount + $monthlyamount + $voluntaryamount + $investmentamount + $childrenamount + $shareamount + $freeinterestamount + $timelimitamount; 
     $totalinterestbirr= $monthlyamount1 + $voluntaryamount1 + $investmentamount1 + $childrenamount1 + $timelimitamount1;

   return view('report.intervalreportdisplay')->withChildrensem1($childrensem1)->withMonthlysem1($monthlysem1)->withChild($child)->withAbalatfemale($abalatfemale)->withAbalatmale($abalatmale)->withAbalmonth($abalmonth)->withVoluntary($voluntary)->withInvestment($investment)->withChildren($children)->withShare($share)->withMonthlyamount($monthlyamount)->withMonthlysaving($monthlysaving)->withMonthlyshare($monthlyshare)->withVoluntaryamount($voluntaryamount)->withInvestmentamount($investmentamount)->withChildrenamount($childrenamount)->withShareamount($shareamount)->withMonthlyabalats($monthlyabalats)->withMonthlymale($monthlymale)->withMonthlyfemale($monthlyfemale)->withAbalpenality($abalpenality)->withAbalpenalitycount($abalpenalitycount)->withAbalpenalityamount($abalpenalityamount)->withAbalat($abalat)->withAbalatsumpermonth($abalatsumpermonth)->withFeesum($feesum)->withMonthlyadmi($monthlyadmi)->withMonthlyinterest($monthlyinterest)->withTotalbirr($totalbirr)->withTotalinterestbirr($totalinterestbirr);
    

}


    public function index()
    {
    	$abalats = Abalat::all();

    	return view('report.month')->withAbalats($abalats);
    }
    public function register(Request $request)
    {
    	$abalats = Abalat::all();
        $monthly = MonthlySaving::all();
        $voluntary=VoluntarySaving::all();
        $timeliit=TimeLimitedSaving::all();
        $freeinterest = FreeInterestSaving::all();
        $childrensave = ChildrenSaving::all();
        $investment = InvestmentSaving::all();
        $returns =ReturnNormal::all();
        $normals = Normalcredit::all();
        $submembers = Submember::all();


    	$abalat = new Abalat;

              //monthly mature
    //      $count = DB::table('abalats')
    // ->join('monthly_savings', 'abalats.id', '=', 'monthly_savings.code')->where('code',$request->code)->where('deleted_at',NULL)->where('type','mature')->count();

    	 $gender = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('code',$request->code)->get();
 
      $count = MonthlySaving::where('accountNum',$request->code)->where('deleted_at',NULL)->where('type','mature')->count();

         $savingTotal = MonthlySaving::where('accountNum',$request->code)->where('type','mature')->where('deleted_at',NULL)->sum('saving');
      $savingTotalau = MonthlySaving::where('deleted_at',NULL)->where('month','=','Auguest')->sum('saving');
     $shareTotalau = MonthlySaving::where('deleted_at',NULL)->where('month','=','Auguest')->sum('share');

     $sharesavingau = $savingTotalau + $shareTotalau;
     $shareTotal = MonthlySaving::where('accountNum',$request->code)->where('type','mature')->where('deleted_at',NULL)->sum('share'); 
     $interestTotal = MonthlySaving::where('accountNum',$request->code)->where('type','mature')->where('deleted_at',NULL)->sum('interest'); 
     $amountTotal = MonthlySaving::where('accountNum',$request->code)->where('type','mature')->where('deleted_at',NULL)->sum('amount');
     $aa = $request->code;
     $sub = Submember::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('number'); 

    //monthly children
     $countChild = MonthlySaving::where('accountNum',$request->code)->where('deleted_at',NULL)->where('type','child')->count();

         $savingtotalChild = MonthlySaving::where('accountNum',$request->code)->where('deleted_at',NULL)->where('type','child')->sum('saving'); 
     $sharetotalChild = MonthlySaving::where('accountNum',$request->code)->where('deleted_at',NULL)->where('type','child')->sum('share'); 
     $interesttotalChild = MonthlySaving::where('accountNum',$request->code)->where('deleted_at',NULL)->where('type','child')->sum('interest'); 
     $amounttotalChild = MonthlySaving::where('accountNum',$request->code)->where('deleted_at',NULL)->where('type','child')->sum('amount');
foreach ($gender as $key) {
    
   if($key->gender=='M'){
    if ($sub<20) {
    	$possibleLoan = $amountTotal*7;
    }
    elseif ($sub>=20 && $sub<50) {
    	$possibleLoan = $amountTotal*8;
    }
    elseif ($sub>=50 && $sub<100) {
    	$possibleLoan=$amountTotal*9;
    }
    else {
    	$possiblelLoan = $amountTotal*10;
    }
}
elseif($key->gender=='F'){
    if ($sub<20) {
        $possibleLoan = $amountTotal*8;
    }
    elseif ($sub>=20 && $sub<50) {
        $possibleLoan = $amountTotal*9;
    }
    else {
        $possiblelLoan = $amountTotal*10;
    }
}
}

    if ($count<6) {
    	$countAlert = "impossible to take loan because he/she hasn't saved for 6 months!!!!";
    	# code...
    }
    else{
    	$countAlert = "possible to take loan because he/she has saved for >=6 months. thank you!! ";
    }

    //voluntary
    $voluntaries = Abalat::all();
    $countVoluntary = VoluntarySaving::where('accountNum',$request->code)->where('deleted_at',NULL)->count();
     $interesttotalVoluntary = VoluntarySaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('interest'); 
     $amounttotalVoluntary = VoluntarySaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('amount');

    //timelimited
     $timeliits = Abalat::all();
     $countTimelimit = TimeLimitedSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->count();
     $interesttotalTimelimit = TimeLimitedSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('interest'); 
     $amounttotalTimelimit = TimeLimitedSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('amount');

       //investment
     $investments = Abalat::all();
    $countInvestment = InvestmentSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->count();
     $interesttotalInvestment = InvestmentSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('interest'); 
     $amounttotalInvestment = InvestmentSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('amount');

    //children
     $childrens = Abalat::all();
    $countChildren = ChildrenSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->count();
     $interesttotalChildren = ChildrenSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('interest'); 
     $amounttotalChildren = ChildrenSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('amount');
     //freeInterest
     $frees = Abalat::all();
    $countfree = FreeInterestSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->count();
     //     $savingtotalFree = FreeInterestSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('saving'); 
     // $sharetotalFree = FreeInterestSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('share');  
     $amounttotalFree = FreeInterestSaving::where('accountNum',$request->code)->where('deleted_at',NULL)->sum('amount');

    return view('report.months')->withSavingTotal($savingTotal)->withShareTotal($shareTotal)
    ->withInterestTotal($interestTotal)->withAmountTotal($amountTotal)->withCount($count)
    ->withSub($sub)->withPossibleLoan($possibleLoan)->withCountAlert($countAlert)->withAbalats($abalats)->withCountVoluntary($countVoluntary)->withInteresttotalVoluntary($interesttotalVoluntary)->withAmounttotalVoluntary($amounttotalVoluntary)->withCountTimelimit($countTimelimit)->withInteresttotalTimelimit($interesttotalTimelimit)->withAmounttotalTimelimit($amounttotalTimelimit)->withCountInvestment($countInvestment)->withInteresttotalInvestment($interesttotalInvestment)->withAmounttotalInvestment($amounttotalInvestment)->withCountChildren($countChildren)->withInteresttotalChildren($interesttotalChildren)->withAmounttotalChildren($amounttotalChildren)->withCountfree($countfree)->withAmounttotalFree($amounttotalFree)->withCountChild($countChild)->withSavingtotalChild($savingtotalChild)->withSharetotalChild($sharetotalChild)->withInteresttotalChild($interesttotalChild)->withAmounttotalChild($amounttotalChild)->withAa($aa)->withVoluntaries($voluntaries)->withFrees($frees)->withChildrens($childrens)->withTimelimits($timeliits)->withInvestments($investments)->withMonthly($monthly)->withSavingTotalau($savingTotalau)->withShareTotalau($shareTotalau)->withSharesavingau($sharesavingau);

}
}
