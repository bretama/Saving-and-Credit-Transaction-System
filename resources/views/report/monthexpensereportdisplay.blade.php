@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark"><b>Monthly expenses Report</b></h1>

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
    		<h2>Expense Monthly report</h2>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Total payment expense</th>
                    <th>Total abel expense</th>
                    <th>Total expense for electricity</th>
                    <th>for house allowance</th>
                   <th>telecom expense</th> 
                   <th>water expense</th> 
                   <th>for coffee and tea</th> 
                   <th>for commission</th> 
                 
                </tr>
                <tr>
                    <td>{{$basicSalarypayment}}</td>
                    <td>{{$totalabel}} </td>
                    <td>{{$totalelectricity}} </td>
                    <td>{{$totalhouseallowance }}</td>
                    <td>{{$totaltelecom}}</td>
                    <td>{{$totalwater}}</td>
                    <td>{{$totalteacoffee}}</td>
                    <td>{{$totalcommission}}</td>
                    

    			</tr>
    		</table>
    	</div>
    </div>
     <div class="box-header with-border">
            <h2>Expense withdrawal</h2>
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th></th>
                    <th>Normal credit</th>
                    <th>typecredit</th>
                    <th>voluntary</th>
                   <th>timelimite</th> 
                   
                 
                </tr>
                <tr>
                    <td>{{$totalnormalcredit}}</td>
                    <td>{{$totaltypecredit}} </td>
                    <td>{{$totalvoluntary}} </td>
                    <td>{{$totaltimelimit }}</td>
                   
                    

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
