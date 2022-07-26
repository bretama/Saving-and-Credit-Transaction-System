@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark"></h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/normalcreditdisplay')}}">normal credit</a> </li>
    					<li class="breadcrumb-item active"></li>
    				</ol>
    			</div>
    		</div>
    	</div>

    </div>

    <section class="content">


    <div class="container">
        <div class="row">
    	<div class="container-fluid">
    <div class="box box-primary">
        <div class="box-header with-border">
    		<p>
    			<a href="{{url('/normalcreditdisplay')}} " class="btn btn-primary"> normal-credit display</a>
    		</p>

<?php 




$i=1;
//$remain=[];
$total=[];
$inte=0;

//echo $abalatsnormalcredit;
$interest = [];
$amount1 = round($amount/$n);
$sum = 0;
$sums =0;
if ($normal=='normal') {
for ($i=1; $i <=$n; $i++) { 
  $inte = round(($amount -($i*$amount/$n)+$amount/$n )*$ndays*0.1/365.5);
    if ($inte<=0) {
       $interest[$i] = 0; 
    }
    else{
        $interest[$i] = $inte;
    }
$sum = $sum + $interest[$i];
    $total[$i] = $amount1 + $interest[$i];
    $ndays=30;
}
}
elseif($normal=='type')
{
 for ($i=1; $i <=$n; $i++) { 
  $inte = round(($amount -($i*$amount/$n)+$amount/$n )*$ndays*0.06/365.5);
    if ($inte<=0) {
       $interest[$i] = 0; 
    }
    else{
        $interest[$i] = $inte;
    }
$sum = $sum + $interest[$i];
    $total[$i] = $amount1 + $interest[$i];
    $ndays=30;
}   
}
$sums = $sum+$amount;
?>



            <div class="table-responsive">
                <h2><b>The Loan account is {{$creditid}}</b></h2>
    		<table class="table table-bordered table-striped">
    			
                
                    <th>Image</th>
    				<th>Account Number</th>
    				<th>name</th>
    				<th>fname</th>
                    <th>phone</th>
                    <th>loan </th>
                    <!-- <th>Interest</th> -->
                    <!-- <th>ወለድ </th> -->
                    <!-- <th>payed</th> -->
                    
                    <th>loan date </th>
                    <th>first return-date</th>
                    <th>final return date</th>
    				
                    
    			
                @foreach($abalatsnormalcredit as $abal)

                @if($abal->code == $code)
    			
                        <th><img src="{{asset('uploads/members/' . $abal->image)}}" width="100px;" height="100px;" alt="Image"> </th>
        				<td>{{$abal->code}}</td>
        				<td>{{$abal->name}}</td>
        				<td>{{$abal->fname}} </td>
        			    <td> {{$abal->phone}} </td>
                        <td>{{$abal->amount}}</td>
                    
                        <td>{{$abal->creditDate}}</td>
                        <td>{{$abal->firstDate}}</td>
                        <td> {{$abal->finalDate}} </td>
                        
                   
    			
                <!-- @endif -->
                @endforeach
                <tr>
                    <th>Payments</th>
                    <th>Amount per month</th>
                    <th>Interest</th>
                    <th>Total payment per month</th>
                    <!-- <th>Remain Amount</th> -->
                </tr>
                @for($i=1;$i<=$n; $i++)
                 <tr>
                    <td>{{$i}}</td>
                    <td>{{$amount1}}</td>
                     <td>{{$interest[$i]}}</td>
                     <td>{{$total[$i]}}</td>
      
                 </tr>
                 @endfor
                 
    		</table>
            <h3>the total summation is {{$sums}} </h3>
            <div class="text-sm-right">
               
            </div>
    	</div>
    </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete-form').on('submit',function(){
            if (confirm("Are you sure you want to Delete it?")) {
                return true;
            }
            else{
                return false;
            }
        });
    });
</script>
    </section>

 @endsection

 <!-- @section('scrip') -->