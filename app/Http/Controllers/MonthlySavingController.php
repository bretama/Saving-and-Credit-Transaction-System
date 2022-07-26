<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Abalat;
use Carbon\Carbon;
use App\DateConvert;
use App\dateConverter;
use App\MonthlySaving;
use DB;
use PDF;
use Auth;
use App\Share;
use App\ChildrenSaving;
use App\InvestmentSaving;
use App\VoluntarySaving;

class MonthlySavingController extends Controller
{
  public function export_pdf()
  {
    // Fetch all customers from database
    $monthlysaving = MonthlySaving::get();
    // Send data to the view using loadView function of PDF facade
    $pdf = PDF::loadview('register.monthlydisplay',compact('monthlysaving'));
    // If you want to store the generated pdf to the server then you can use the store function
   // $pdf->save(storage_path().'_filename.pdf');
    // Finally, you can download the file using download function
    return $pdf->download('customers.pdf');
  }
    public function index()
    {
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


      $today= Carbon::now()->subDays(1);

       $entrydate = explode("-", $today);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
       
        $monthlysaving = MonthlySaving::orderBy('accountNum', 'desc')->where('entrydate','>=',$entrydate111)->where('entrydate','<=',$entrydate11)->where('deleted_at','=',NULL)->get();
         $abalmonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->join('penalities','abalats.code','=','penalities.accountNum')->get(); 
    //dd($abalmonth);

     return view('register.monthlydisplay')->withAbalats($abalats)->withMonthlysaving($monthlysaving)->withAbalmonth($abalmonth);
    }
public function index1()
{
   $abalmonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','Auguest')->orderBy('monthly_savings.accountNum', 'ASC')->get();

   $abalpenality = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','Auguest')->orderBy('penalities.accountNum', 'ASC')->get();
    $abalpenalitycount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','Auguest')->orderBy('penalities.accountNum', 'ASC')->count();
     $abalpenalityamount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','Auguest')->orderBy('penalities.accountNum', 'ASC')->sum('penality');



   $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','Auguest')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->count();  
  


   $monthlymale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','Auguest')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->count();

     $monthlyfemale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','Auguest')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->count();

   $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','Auguest')->distinct('monthly_savings.accountNum')->count();
   
    $voluntary = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','Auguest')->get();
           $investment = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','Auguest')->get(); 
             $children = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','Auguest')->get();
               $share = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','Auguest')->get();

                $monthlyamount = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','Auguest')->sum('amount'); 

                 $monthlyshare = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','Auguest')->sum('share'); 
                  $monthlysaving = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','Auguest')->sum('saving');

                   // $monthlypenality = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->join('penalities','abalats.code','=','penalities.accountNum')->where('penalities.month','=','Auguest')->sum('penality');  


                $voluntaryamount = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','Auguest')->sum('amount');

               $investmentamount = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','Auguest')->sum('amount');
                
                $childrenamount = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','Auguest')->sum('amount');
                $shareamount = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','Auguest')->sum('amount');



   return view('register.monthlydisplay1')->withAbalmonth($abalmonth)->withVoluntary($voluntary)->withInvestment($investment)->withChildren($children)->withShare($share)->withMonthlyamount($monthlyamount)->withMonthlysaving($monthlysaving)->withMonthlyshare($monthlyshare)->withVoluntaryamount($voluntaryamount)->withInvestmentamount($investmentamount)->withChildrenamount($childrenamount)->withShareamount($shareamount)->withMonthlyabalats($monthlyabalats)->withMonthlymale($monthlymale)->withMonthlyfemale($monthlyfemale)->withAbalpenality($abalpenality)->withAbalpenalitycount($abalpenalitycount)->withAbalpenalityamount($abalpenalityamount);
}

public function index2()
{
   $abalmonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','September')->orderBy('monthly_savings.accountNum', 'ASC')->get(); 
   
 $abalpenality = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','September')->orderBy('penalities.accountNum', 'ASC')->get();
    $abalpenalitycount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','September')->orderBy('penalities.accountNum', 'ASC')->count();
     $abalpenalityamount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','September')->orderBy('penalities.accountNum', 'ASC')->sum('penality');

   $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','September')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->count();  
  


   $monthlymale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','September')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->count();

     $monthlyfemale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','September')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->count();


    $voluntary = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','September')->get();
           $investment = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','September')->get(); 
             $children = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','September')->get();
               $share = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','September')->get();

                $monthlyamount = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','September')->sum('amount'); 

                 $monthlyshare = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','September')->sum('share'); 
                  $monthlysaving = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','September')->sum('saving');

                   // $monthlypenality = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->join('penalities','abalats.code','=','penalities.accountNum')->where('penalities.month','=','September')->sum('penality');  


                $voluntaryamount = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','September')->sum('amount');

               $investmentamount = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','September')->sum('amount');
                
                $childrenamount = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','September')->sum('amount');
                $shareamount = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','September')->sum('amount');



   return view('register.monthlydisplay1')->withAbalmonth($abalmonth)->withVoluntary($voluntary)->withInvestment($investment)->withChildren($children)->withShare($share)->withMonthlyamount($monthlyamount)->withMonthlysaving($monthlysaving)->withMonthlyshare($monthlyshare)->withVoluntaryamount($voluntaryamount)->withInvestmentamount($investmentamount)->withChildrenamount($childrenamount)->withShareamount($shareamount)->withMonthlyabalats($monthlyabalats)->withMonthlymale($monthlymale)->withMonthlyfemale($monthlyfemale)->withAbalpenality($abalpenality)->withAbalpenalitycount($abalpenalitycount)->withAbalpenalityamount($abalpenalityamount);
}

public function index3()
{
   $abalmonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','October')->orderBy('monthly_savings.accountNum', 'ASC')->get(); 
   
      $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','October')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->count();  
  
$abalpenality = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','October')->orderBy('penalities.accountNum', 'ASC')->get();
    $abalpenalitycount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','October')->orderBy('penalities.accountNum', 'ASC')->count();
     $abalpenalityamount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','October')->orderBy('penalities.accountNum', 'ASC')->sum('penality');

   $monthlymale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','October')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->count();

     $monthlyfemale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','October')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->count();

    $voluntary = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','October')->get();
           $investment = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','October')->get(); 
             $children = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','October')->get();
               $share = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','October')->get();

                $monthlyamount = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','October')->sum('amount'); 

                 $monthlyshare = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','October')->sum('share'); 
                  $monthlysaving = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','October')->sum('saving');

                   // $monthlypenality = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->join('penalities','abalats.code','=','penalities.accountNum')->where('penalities.month','=','October')->sum('penality');  


                $voluntaryamount = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','October')->sum('amount');

               $investmentamount = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','October')->sum('amount');
                
                $childrenamount = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','October')->sum('amount');
                $shareamount = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','October')->sum('amount');



   return view('register.monthlydisplay1')->withAbalmonth($abalmonth)->withVoluntary($voluntary)->withInvestment($investment)->withChildren($children)->withShare($share)->withMonthlyamount($monthlyamount)->withMonthlysaving($monthlysaving)->withMonthlyshare($monthlyshare)->withVoluntaryamount($voluntaryamount)->withInvestmentamount($investmentamount)->withChildrenamount($childrenamount)->withShareamount($shareamount)->withMonthlyabalats($monthlyabalats)->withMonthlymale($monthlymale)->withMonthlyfemale($monthlyfemale)->withAbalpenality($abalpenality)->withAbalpenalitycount($abalpenalitycount)->withAbalpenalityamount($abalpenalityamount);
}

public function index4()
{
   $abalmonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','November')->orderBy('monthly_savings.accountNum', 'ASC')->get(); 

      $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','November')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->count();  
  
    $abalpenality = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','November')->orderBy('penalities.accountNum', 'ASC')->get();
    $abalpenalitycount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','November')->orderBy('penalities.accountNum', 'ASC')->count();
     $abalpenalityamount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','November')->orderBy('penalities.accountNum', 'ASC')->sum('penality');

   $monthlymale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','November')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->count();

     $monthlyfemale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','November')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->count();
   
    $voluntary = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','November')->get();
           $investment = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','November')->get(); 
             $children = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','November')->get();
               $share = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','November')->get();

                $monthlyamount = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','November')->sum('amount'); 

                 $monthlyshare = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','November')->sum('share'); 
                  $monthlysaving = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','November')->sum('saving');

                   // $monthlypenality = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->join('penalities','abalats.code','=','penalities.accountNum')->where('penalities.month','=','November')->sum('penality');  


                $voluntaryamount = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','November')->sum('amount');

               $investmentamount = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','November')->sum('amount');
                
                $childrenamount = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','November')->sum('amount');
                $shareamount = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','November')->sum('amount');



   return view('register.monthlydisplay1')->withAbalmonth($abalmonth)->withVoluntary($voluntary)->withInvestment($investment)->withChildren($children)->withShare($share)->withMonthlyamount($monthlyamount)->withMonthlysaving($monthlysaving)->withMonthlyshare($monthlyshare)->withVoluntaryamount($voluntaryamount)->withInvestmentamount($investmentamount)->withChildrenamount($childrenamount)->withShareamount($shareamount)->withMonthlyabalats($monthlyabalats)->withMonthlymale($monthlymale)->withMonthlyfemale($monthlyfemale)->withAbalpenality($abalpenality)->withAbalpenalitycount($abalpenalitycount)->withAbalpenalityamount($abalpenalityamount);
}

public function index5()
{
   $abalmonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','December')->orderBy('monthly_savings.accountNum', 'ASC')->get();

      $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','December')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->count();  
  
$abalpenality = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','December')->orderBy('penalities.accountNum', 'ASC')->get();
    $abalpenalitycount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','December')->orderBy('penalities.accountNum', 'ASC')->count();
     $abalpenalityamount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','December')->orderBy('penalities.accountNum', 'ASC')->sum('penality');

   $monthlymale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','December')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->count();
     $monthlyfemale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','December')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->count(); 
   
    $voluntary = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','December')->get();
           $investment = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','December')->get(); 
             $children = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','December')->get();
               $share = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','December')->get();

                $monthlyamount = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','December')->sum('amount'); 

                 $monthlyshare = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','December')->sum('share'); 
                  $monthlysaving = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','December')->sum('saving');

                   // $monthlypenality = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->join('penalities','abalats.code','=','penalities.accountNum')->where('penalities.month','=','December')->sum('penality');  


                $voluntaryamount = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','December')->sum('amount');

               $investmentamount = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','December')->sum('amount');
                
                $childrenamount = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','December')->sum('amount');
                $shareamount = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','December')->sum('amount');



   return view('register.monthlydisplay1')->withAbalmonth($abalmonth)->withVoluntary($voluntary)->withInvestment($investment)->withChildren($children)->withShare($share)->withMonthlyamount($monthlyamount)->withMonthlysaving($monthlysaving)->withMonthlyshare($monthlyshare)->withVoluntaryamount($voluntaryamount)->withInvestmentamount($investmentamount)->withChildrenamount($childrenamount)->withShareamount($shareamount)->withMonthlyabalats($monthlyabalats)->withMonthlymale($monthlymale)->withMonthlyfemale($monthlyfemale)->withAbalpenality($abalpenality)->withAbalpenalitycount($abalpenalitycount)->withAbalpenalityamount($abalpenalityamount);
}

public function index6()
{
   $abalmonth = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','January')->orderBy('monthly_savings.accountNum', 'ASC')->get(); 

      $monthlyabalats = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','January')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->count();  
  
$abalpenality = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','January')->orderBy('penalities.accountNum', 'ASC')->get();
    $abalpenalitycount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','January')->orderBy('penalities.accountNum', 'ASC')->count();
     $abalpenalityamount = DB::table('abalats')->join('penalities', 'abalats.code', '=', 'penalities.accountNum')->where('penalities.month','=','January')->orderBy('penalities.accountNum', 'ASC')->sum('penality');

   $monthlymale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','January')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','M')->count();

     $monthlyfemale = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','January')->where('monthly_savings.deleted_at','=',NULL)->distinct('monthly_savings.accountNum')->where('abalats.gender','=','F')->count();
   
    $voluntary = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','January')->get();
           $investment = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','January')->get(); 
             $children = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','January')->get();
               $share = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','January')->get();

                $monthlyamount = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','January')->sum('amount'); 

                 $monthlyshare = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','January')->sum('share'); 
                  $monthlysaving = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->where('monthly_savings.month','=','January')->sum('saving');

                   // $monthlypenality = DB::table('abalats')->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->join('penalities','abalats.code','=','penalities.accountNum')->where('penalities.month','=','January')->sum('penality');  


                $voluntaryamount = DB::table('abalats')->join('voluntary_savings', 'abalats.code', '=', 'voluntary_savings.accountNum')->where('voluntary_savings.month','=','January')->sum('amount');

               $investmentamount = DB::table('abalats')->join('investment_savings', 'abalats.code', '=', 'investment_savings.accountNum')->where('investment_savings.month','=','January')->sum('amount');
                
                $childrenamount = DB::table('abalats')->join('children_savings', 'abalats.code', '=', 'children_savings.accountNum')->where('children_savings.month','=','January')->sum('amount');
                $shareamount = DB::table('abalats')->join('shares', 'abalats.code', '=', 'shares.accountNum')->where('shares.month','=','January')->sum('amount');



   return view('register.monthlydisplay1')->withAbalmonth($abalmonth)->withVoluntary($voluntary)->withInvestment($investment)->withChildren($children)->withShare($share)->withMonthlyamount($monthlyamount)->withMonthlysaving($monthlysaving)->withMonthlyshare($monthlyshare)->withVoluntaryamount($voluntaryamount)->withInvestmentamount($investmentamount)->withChildrenamount($childrenamount)->withShareamount($shareamount)->withMonthlyabalats($monthlyabalats)->withMonthlymale($monthlymale)->withMonthlyfemale($monthlyfemale)->withAbalpenality($abalpenality)->withAbalpenalitycount($abalpenalitycount)->withAbalpenalityamount($abalpenalityamount);
}
    public function search(Request $request)
    {
       // $materials = Material::all();
        $search = $request->get('search');
        $monthlysaving= DB::table('monthly_savings')->where('accountNum','like','%'.$search.'%')->where('deleted_at','=',NULL)->get();
        //dd($materials);
        return view('register.monthlydisplay')->withMonthlysaving($monthlysaving);
    }
    public function register()
    {
      $today = new DateConvert;
      $abalats = Abalat::all();
        return view('register.registermonth')->withAbalats($abalats);
    }
    public function store(Request $request){
      $this->validate($request, [
           'code'=>'required',
            'amount'=>'required',
            'bank' =>'required',
            // 'sem1' => 'required',
            'month' => 'required',
            'entrydate'=>'required',
            'type'    =>'required',
             'status' => 'required'
      ]);


         $monthly = new MonthlySaving;
         $roles = DB::table('monthly_savings')->select('id', 'interest','interestdate','saving','type')->get();
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
           $interest=0;
         }
         else{
        if ($user->type=='child') {
          $interest = ( $user->saving * $ndays*0.09)/365.25;
           
        }
        else {
        $interest =  $user->saving * $ndays*0.0001916495551;
      }
    }
         DB::table('monthly_savings')
            ->where('id', $user->id)
            ->update(['interest' => $interest]);

}
       // $last = DB::table('monthly_savings')->select('amount')->where('code',$request->code)->latest()->first();
       // $last = $last->amount;
  $saving = $request->amount;
      if($saving>=250){
      $save=$saving*0.8;
      $share=$saving*0.2;
       if ($request->status==0) {
        $username=Auth::user()->name;
        $monthly->username = $username;
        $monthly->accountNum = $request->code;
         $monthly->saving = $save;
         $monthly->bank = $request->bank;
         // $monthly->recipt = $request->recipt;
         $monthly->sem1 = $request->sem1;
         $monthly->share = $share;
         $monthly->month = $request->month;
         $monthly->amount = $request->amount;
         $x=$request->amount;
         //entry date +one month
         $entry = $request->entrydate;
         $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
         if($month==13){
          if($date==1 || $date==2){
         
          $month=12;
          $date=30;
          $year=$year;
          $entrydate1=$year."-".$month."-".$date;

        $monthly->entrydate=$entrydate1;
      }
      else{
        $month=1;
        $date=2;
        $year=$year+1;
        $entrydate1=$year."-".$month."-".$date;

        $monthly->entrydate=$entrydate1;

      }
     }
     
        elseif($month==2 && $date==30)
        {
          $date=29;
          $entrydate1=$year."-".$month."-".$date;

        $monthly->entrydate=$entrydate1;
        }
        else{
        $entrydate1=$year."-".$month."-".$date;

        $monthly->entrydate=$entrydate1;
      }
       //  $intmonth = (int)$month;
       // $months = $intmonth+1;
       //  $strmonth = strval($months);
       //  $entrydates=$year."-".$months."-".$date;
        //interest date
        $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
       if($month==13){
          if($date==1 || $date==2){
         
          $month=12;
          $date=30;
          $year=$year;
          $entrydates=$year."-".$month."-".$date;
        $monthly->interestdate = $entrydates;
        }
        else{
        $month=1;
        $date=2;
        $year=$year+1;
        $entrydates=$year."-".$month."-".$date;
        $monthly->interestdate = $entrydates;
      }
    }
         elseif($month==2 && $date==30)
        {
          $date=29;
          $entrydates=$year."-".$month."-".$date;
        $monthly->interestdate = $entrydates;
        }
        else{
      $entrydates=$year."-".$month."-".$date;
        $monthly->interestdate = $entrydates;
      }
        

        $entrydates=strtotime($entrydates);
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
          $monthly->interest = 0;
        }
        else{
        if ($request->type=='child') {
          $interest = ( $save * $ndays*0.09)/365.25;
           $monthly->interest = $interest;
        }
        else {
        $interest =  $save * $ndays*0.0001916495551;
        $monthly->interest = $interest; 
      }
        }//SELECT COUNT(DISTINCT $code) FROM Customers;
      // $suminterest=DB::select('SELECT code, sum(interest) FROM monthly_savings GROUP BY code');
      // $suminterestsaving = json_encode($suminterest + $sumsaving);
      $monthly->type = $request->type;
      $monthly->save();
      return redirect()->to('/monthlydisplay')->with('success','successfully registered');
        }
        else{
          if ($request->status==1) {
            $y = (($request->amount*5)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
            # code...
          }
          else{
            $y = (($request->amount*12)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
          }
        }
      }
 else{
   return redirect('/monthlydisplay')->with('error','WRONG DATA!!! that is < 250!');
 }
       //elseif ($request->status=1 && $request->case1=1) {
        //   if ($last>$request->amount) {
        //     $y = (($last*5)/100); 
        //   return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
        //   }
        //  else{
        //   $y = (($request->amount*5.0)/100.0); 
        //   return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
        //  }
        // }
        // else {
        //  if ($request->case1=1) {
        //     if ($last>$request->amount) {
        //      $y = (($last*12.0)/100.0); 
        //   return redirect('/penalityregister')->with('success','your penality is '.$y.'and depose it first');
        //   }
        //  }
         
        //   else{
        //     $y = (($request->amount*12.0)/100.0); 
        //   return redirect('/penalityregister')->with('success','your penality is '.$y.'and depose it first');
        //   }
         
        // }
        
    }
    public function edit($id)
    {
      $abalats = Abalat::all();
      $edit = MonthlySaving::find($id);
      return view('register.editmonth')->withEdit($edit)->withAbalats($abalats);
    }
    public function update(Request $request, $id)
    {
     
       $monthly = MonthlySaving::find($request->id);
        $roles = DB::table('monthly_savings')->select('id', 'interest','interestdate','saving','type')->get();
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
           $interest=0;
         }
         else{
        if ($user->type='ህፃን') {
          $interest = ( $user->saving * $ndays*0.09)/365.25;
           
        }
        else {
        $interest =  $user->saving * $ndays*0.0001916495551;
      }}
         DB::table('monthly_savings')
            ->where('id', $user->id)
            ->update(['interest' => $interest]);
}
        
      // $last = DB::table('monthly_savings')->select('amount')->where('accountNum',$request->code)->latest()->first();
       // $last = $last->amount;
      $saving = $request->amount;
      $save=$saving*0.8;
      $share=$saving*0.2;
       if ($request->status==0) {
        //  $username=Auth::user()->name;
        // $monthly->username = $username;
        $monthly->accountNum = $request->code;
         $monthly->saving = $save;
         $monthly->bank = $request->bank;
         // $monthly->recipt = $request->recipt;
         $monthly->sem1 = $request->sem1;
         $monthly->share = $share;
         $monthly->month = $request->month;
          $monthly->amount = $request->amount;
         $x=$request->amount;
         $entry = $request->entrydate;
        $timestamp = DateConvert:: toEthiopian($entry);
         $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        if($month==13){
          if($date==1 || $date==2){
         
          $month=12;
          $date=30;
          $year=$year;
          $entrydate1=$year."-".$month."-".$date;

        $monthly->entrydate=$entrydate1;
      }
      else{
        $month=1;
        $date=2;
        $year=$year+1;
        $entrydate1=$year."-".$month."-".$date;

        $monthly->entrydate=$entrydate1;

      }
     }
     
        elseif($month==2 && $date==30)
        {
          $date=29;
          $entrydate1=$year."-".$month."-".$date;

        $monthly->entrydate=$entrydate1;
        }
        else{
        $entrydate1=$year."-".$month."-".$date;

        $monthly->entrydate=$entrydate1;
      }
        //interest date
       $entryinterest = Carbon::parse($entry)->addMonths(1);
        $timestamp = DateConvert:: toEthiopian($entryinterest);
        $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
          if($month==13){
          if($date==1 || $date==2){
         
          $month=12;
          $date=30;
          $year=$year;
          $entrydates=$year."-".$month."-".$date;
        $monthly->interestdate = $entrydates;
        }
        else{
        $month=1;
        $date=2;
        $year=$year+1;
        $entrydates=$year."-".$month."-".$date;
        $monthly->interestdate = $entrydates;
      }
    }
         elseif($month==2 && $date==30)
        {
          $date=29;
          $entrydates=$year."-".$month."-".$date;
        $monthly->interestdate = $entrydates;
        }
        else{
      $entrydates=$year."-".$month."-".$date;
        $monthly->interestdate = $entrydates;
      }
        
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
        if ($ndays<0) {
          $monthly->interest = 0;
        }
        else{
        if ($request->type=='child') {
          $interest = ( $save * $ndays*0.09)/365.25;
           $monthly->interest = $interest;
        }
        else {
        $interest =  $save * $ndays*0.0001916495551;
        $monthly->interest = $interest;
      }
        }//SELECT COUNT(DISTINCT $code) FROM Customers;
     $monthly->type = $request->type;
      $monthly->save();
     return redirect()->to('/monthlydisplay')->with('success','successfully updated');
    }
    else{
          if ($request->status==1) {
            $y = (($request->amount*5)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
            # code...
          }
          else{
            $y = (($request->amount*12)/100); 
          return redirect('/penalityregister')->with('success','your penality is '.$y.' and depose it first');
          }
        }
      }
    public function destroy($id)
    {
     $monthly = MonthlySaving::find($id);
     $monthly->delete();
     return redirect('/monthlydisplay')->with('success','data deleted!');
    }
    public function action(Request $request)
    {
        if ($request->ajax()) {
          # code...
          $query = $request->get('query');
          if ($query != '') {
            # code...
            $data = DB::table('monthly_savings')->where('accountNum','like','%'.$query.'%')->orWhere('saving','like','%'.$query.'%')->orWhere('share','like','%'.$query.'%')->orWhere('month','like','%'.$query.'%')->orderBy('id','desc')->get();

          }
          else {
            $data = DB::table('monthly_savings')->orderBy('id','desc')->get();

          }
          $total_row = $data->count();
          if ($total_row > 0) {
            foreach ($data as $row) {
              # code...
              $output .='
              <tr>
                  <td>'.$row->accountNum.'</td>
                  <td>'.$row->share.'</td>
                  <td>'.$row->saving.'</td>
                  <td>'.$row->month.'</td>
                  <td>'.$row->entrydate.'</td>
                  <td>'.$row->interest.'</td>
              ';
            }
          }
          else
          {
            $output = '
             <tr>
                <td align = "center" colspan="5"> No Data </td>
              </tr>
            ';
          }
          $data = array(
           'table_data' => $output,
           'total_data' =>$total_data
          );
          echo json_encode($data);
        }
    }
     public function sykefelu()
    {
      $abalmonth = DB::table('abalats')
    ->join('monthly_savings', 'abalats.code', '=', 'monthly_savings.accountNum')->get(); 
    foreach ($abalmonth as $key) {
      $entry=$key->entrydate;
      
      # code...
    }


      // $roles = DB::table('monthly_savings')->select('entrydate')->get();
      // return view('register.payment');

    }
}
