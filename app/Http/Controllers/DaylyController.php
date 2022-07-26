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
use App\Abel;
use App\Comission;
use App\AdditionalExpense;
use DB;
use App\DateConvert;
use Carbon\Carbon;
use App\Withdrawal;
class DaylyController extends Controller
{
     public function index()
  {
    //$price = DB::table('monthly_savings')->sum('sem1');
    // $price = DB::table('monthly_savings')
  //               ->where('deleted_at', NULL);
        $today = date('Y-m-d');
        $today= Carbon::now()->subDays(1);
        $timestamp = DateConvert::toEthiopian($today);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::where('deleted_at',NULL)->where('entrydates','>=',$entrydate1)->count();
        $abalat = Abalat::where('deleted_at',NULL)->where('entrydates','>=',$entrydate1)->sum('rbirr');
        $abalatcount = Abalat::where('deleted_at',NULL)->where('entrydates','>=',$entrydate1)->count();
        $abalatfemale = Abalat::where('deleted_at',NULL)->where('entrydates','>=',$entrydate1)->where('gender','F')->count();
        $abalatmale = Abalat::where('deleted_at',NULL)->where('entrydates','>=',$entrydate1)->where('gender','M')->count();
        // $ndays = ($today-$entrydates)/86400;
//monthly report
     $monthlyshare = MonthlySaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('share');
     $monthlysaving = MonthlySaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('saving');
     $monthlyamount = MonthlySaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('amount');
     $monthlyinterest = MonthlySaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('interest');
    $monthlytotal = $monthlyinterest + $monthlyamount;
     $monthlycount = MonthlySaving::where('deleted_at',NULL)->distinct('accountNum')->where('entrydate','>=',$entrydate1)->count();
     
     //freeinterest report
    // $freeshare = FreeInterestSaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('share');
     // $freesaving = FreeInterestSaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('amount');
     $freeamount = FreeInterestSaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('amount');
     $freetotal = $freeamount;
     $freecount = FreeInterestSaving::where('deleted_at',NULL)->distinct('accountNum')->where('entrydate','>=',$entrydate1)->count();

     //Investment report
     $investmentamount = InvestmentSaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('amount');
     $investmentinterest = InvestmentSaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('interest');
    $investmenttotal = $investmentinterest + $investmentamount;
    $investmentcount = InvestmentSaving::where('deleted_at',NULL)->distinct('accountNum')->where('entrydate','>=',$entrydate1)->count();
//voluntary report
     $voluntaryamount = VoluntarySaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('amount');
     $voluntaryinterest = VoluntarySaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('interest');
    $voluntarytotal = $voluntaryinterest + $voluntaryamount;
    $voluntarycount = VoluntarySaving::where('deleted_at',NULL)->distinct('accountNum')->where('entrydate','>=',$entrydate1)->count();

    //timelimit report
     $timelimitamount =TimeLimitedSaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('amount');
     $timelimitinterest = TimeLimitedSaving::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('interest');
    $timelimittotal = $timelimitinterest + $timelimitamount;
   $timelimitcount = TimeLimitedSaving::where('deleted_at',NULL)->distinct('accountNum')->where('entrydate','>=',$entrydate1)->count();
    //penality
    $penality = Penality::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('penality');
    $penalitycount= Penality::where('deleted_at',NULL)->distinct('accountNum')->where('entrydate','>=',$entrydate1)->count();
   
    //payment report
    $basicSalarypayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('basicSalary');
     $transportAllowancepayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('transportAllowance');
     $houseAllowancepayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('houseAllowance');
     $grossEarningpayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('grossEarning');
     $incomeTaxpayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('incomeTax');
     $pension1payment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('pension1');
     $pension2payment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('pension2');
     $totalDiductionpayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('totalDiduction');
      $netPaypayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('netPay');
    //$monthlytotal = $monthlyinterest + $monthlyamount;

      //abel report
      $totalabel = Abel::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('total'); 
      //additional allowance
      $totalelectricity = AdditionalExpense::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->where('type','electricPower')->sum('amount');$totalhouseallowance = AdditionalExpense::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->where('type','houseAllowance')->sum('amount');  
      $totaltelecom = AdditionalExpense::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->where('type','telecom')->sum('amount');
      //water report
      $totalwater = Water::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('total');
      $totalteacoffee = TeaCoffee::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('total');
      $totalcommission = Comission::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('total');
      $totalshare = $monthlyshare;
      $totalsaving = $monthlysaving;
      $totalamount = $monthlyamount + $freeamount + $investmentamount + $timelimitamount + $voluntaryamount;
      $totalinterest = $monthlyinterest + $investmentinterest + $voluntaryinterest + $timelimitinterest;
      $totalbalance = $totalamount + $totalinterest + $penality + $abalat;
      return view('report.daylyreportdisplay')->withMonthlyshare($monthlyshare)->withMonthlysaving($monthlysaving)->withMonthlyamount($monthlyamount)->withMonthlyinterest($monthlyinterest)->withMonthlytotal($monthlytotal)->withMonthlycount($monthlycount)->withFreeamount($freeamount)->withFreetotal($freetotal)->withFreecount($freecount)->withInvestmentamount($investmentamount)->withInvestmentinterest($investmentinterest)->withInvestmenttotal($investmenttotal)->withInvestmentcount($investmentcount)->withVoluntaryamount($voluntaryamount)->withVoluntaryinterest($voluntaryinterest)->withVoluntarytotal($voluntarytotal)->withVoluntarycount($voluntarycount)->withTimelimitamount($timelimitamount)->withTimelimitinterest($timelimitinterest)->withTimelimittotal($timelimittotal)->withTimelimitcount($timelimitcount)->withPenality($penality)->withPenalitycount($penalitycount)->withAbalatcount($abalatcount)->withAbalatfemale($abalatfemale)->withAbalatmale($abalatmale)->withTotalshare($totalshare)->withTotalsaving($totalsaving)->withTotalamount($totalamount)->withTotalinterest($totalinterest)->withTotalbalance($totalbalance)->withAbalats($abalats);

	}
  public function expenses()
  {

    $today = date('Y-m-d');
    $today= Carbon::now()->subDays(1);
    $timestamp = DateConvert::toEthiopian($today);
       $entrydate = explode("/", $timestamp);
        $year = $entrydate[2];
        $month = $entrydate[1];
        $date = $entrydate[0];
        $entrydate1=$year."-".$month."-".$date;
        $abalats = Abalat::where('deleted_at','>=',$entrydate1)->count();
    //payment report
    $basicSalarypayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('basicSalary');
     $transportAllowancepayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('transportAllowance');
     $houseAllowancepayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('houseAllowance');
     $grossEarningpayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('grossEarning');
     $incomeTaxpayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('incomeTax');
     $pension1payment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('pension1');
     $pension2payment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('pension2');
     $totalDiductionpayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('totalDiduction');
      $netPaypayment = Payment::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('netPay');
    //$monthlytotal = $monthlyinterest + $monthlyamount;

      //abel report
      $totalabel = Abel::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('total'); 
      //additional allowance
      $totalelectricity = AdditionalExpense::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->where('type','electricPower')->sum('amount');$totalhouseallowance = AdditionalExpense::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->where('type','houseAllowance')->sum('amount');  
      $totaltelecom = AdditionalExpense::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->where('type','telecom')->sum('amount');
      //water report
      $totalwater = Water::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('total');
      $totalteacoffee = TeaCoffee::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('total');
      $totalcommission = Comission::where('deleted_at',NULL)->where('entrydate','>=',$entrydate1)->sum('total');
      $totaltypecredit = Normalcredit::where('deleted_at',NULL)->where('creditDate','>=',$entrydate1)->where('normal','type_credit')->sum('amount');
      $totalnormalcredit = Normalcredit::where('deleted_at',NULL)->where('creditDate','>=',$entrydate1)->where('normal','normal_credit')->sum('amount');
      $totalvoluntary = Withdrawal::where('deleted_at',NULL)->where('withdrawalDate','>=',$entrydate1)->where('type','voluntary')->sum('amount');
      $totaltimelimit = Withdrawal::where('deleted_at',NULL)->where('withdrawalDate','>=',$entrydate1)->where('type','timelimit')->sum('amount');

    return view('report.daylyexpensereportdisplay')->withBasicSalarypayment($basicSalarypayment)->withTransportAllowancepayment($transportAllowancepayment)->withHouseAllowancepayment($houseAllowancepayment)->withGrossEarningpayment($grossEarningpayment)->withIncomeTaxpayment($incomeTaxpayment)->withPension1payment($pension1payment)->withPension2payment($pension2payment)->withTotalDiductionpayment($totalDiductionpayment)->withNetPaypayment($netPaypayment)->withTotalabel($totalabel)->withTotalelectricity($totalelectricity)->withTotalhouseallowance($totalhouseallowance)->withTotaltelecom($totaltelecom)->withTotalwater($totalwater)->withTotalteacoffee($totalteacoffee)->withTotalcommission($totalcommission)->withTotalnormalcredit($totalnormalcredit)->withTotalvoluntary($totalvoluntary)->withTotaltimelimit($totaltimelimit)->withTotaltypecredit($totaltypecredit);
  }
}
