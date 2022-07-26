@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark"><b>Yearly Report</b></h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/')}}">dashboard</a> </li>
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
        <div class="table-responsive">
        <div class="box-header with-border">
    		<h2>Monthly-Savings Yearly report</h2>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                @if($monthlycount >0)
                <tr>
                    <th>Total shares</th>
                    <th>Total Savings</th>
                    <th>Total Amounts</th>
                    <th>Interest</th>
                   <th>Total Balances</th> 
                   <th>Total number of people</th> 
                </tr>
                <tr>
                    <td>{{$monthlyshare}}</td>
                    <td>{{$monthlysaving}} </td>
                    <td>{{$monthlyamount}} </td>
                    <td>{{$monthlyinterest }}</td>
                    <td>{{$monthlytotal}}</td>
                    <td>{{$monthlycount}}</td>
    			</tr>
                @endif
    		</table>
    	</div>
    </div>
    <div class="box-header with-border">
         @if($freecount > 0)
            <h2>FreeInterest Savings Yearly report</h2>
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table11">
               
                <tr>
                   
                    <th>Total Amount</th>
                    <th>Total Balance</th>
                   <th>Total number of people</th>
                </tr>
                <tr>
                   
                    <td>{{$freeamount}} </td>
                    <td>{{$freetotal }}</td>
                    <td>{{$freecount}}</td>
                </tr>
               @endif
            </table>
        </div>
    </div>
    <div class="box-header with-border">
         @if($investmentcount > 0)
            <h2>Investment Savings Yearly report</h2>
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Total Amount</th>
                    <th>Total Interest</th>
                    <th>Total Balance</th>
                   <th>Total number of people</th>
                </tr>
                <tr>
                   <td>{{$investmentamount}}</td>
                    <td>{{$investmentinterest}} </td>
                    <td>{{$investmenttotal}} </td>
                    
                    <td>{{$investmentcount}}</td>
                </tr>
            </table>
            @endif
        </div>
    </div>
    <div class="box-header with-border">
        @if($voluntarycount > 0)
            <h2>Voluntaryamount Savings Yearly report</h2>
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Total Amount</th>
                    <th>Total Interest</th>
                    <th>Total Balance</th>
                   <th>Total number of people</th>
                </tr>
                <tr>
                   <td>{{$voluntaryamount}}</td>
                    <td>{{$voluntaryinterest}} </td>
                    <td>{{$voluntarytotal}} </td>
                    <td>{{$voluntarycount }}</td>
                </tr>
            </table>
            @endif
        </div>
    </div>
    <div class="box-header with-border">
        @if($timelimitcount > 0)
            <h2>Timelimite Savings Yearly report</h2>
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Total Amount</th>
                    <th>Total Interest</th>
                    <th>Total Balance</th>
                   <th>Total number of people</th>
                </tr>
                <tr>
                   <td>{{$timelimitamount}}</td>
                    <td>{{$timelimitinterest}} </td>
                    <td>{{$timelimittotal}} </td>
                    
                    <td>{{$timelimitcount}}</td>
                </tr>
            </table>
            @endif
        </div>
    </div>
    <div class="box-header with-border">
        @if($penalitycount > 0)
            <h2>Penality Yearly report</h2>
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Total Amount</th>
                   <th>Total number of people</th>
                </tr>
                <tr>
                   <td>{{$penality}}</td>
                    <td>{{$penalitycount}} </td>
                </tr>
            </table>
            
        </div>
        @endif
    </div>
     <div class="box-header with-border">

            <h2>Total info. Yearly report</h2>
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Total Members</th>
                    <th>Female members</th>
                    <th>Male members</th>
                    <th>Total Share</th>
                    <th>Total Saving</th>
                    <th>Total Amount</th>
                    <th>Total interest</th>
                    <th>Total Balance</th>
                   <th>Total number of people</th>
                </tr>
                <tr>
                   <td>{{$abalatcount}}</td>
                   <td>{{$abalatfemale}}</td>
                   <td>{{$abalatmale}}</td>
                   <td>{{$totalshare}}</td>
                    <td>{{$totalsaving}} </td>
                    <td>{{$totalamount}} </td>
                    <td>{{$totalinterest}} </td>
                    <td>{{$totalbalance}}</td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</div>
</div>
</div>
</div>

    </section>

 @endsection
