@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">saved type Loan</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/')}}">Dashboard</a> </li>
    					<li class="breadcrumb-item active">register type loan</li>
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
    			<a href="{{url('/typecreditregister')}} " class="btn btn-primary">register type loan</a>
    		</p>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped">
    			<tr>
    				<th>code</th>
    				<th>Name</th>
    				<th>Father Name</th>
    				<th>Grandfather's Name</th>
                    <th>Phone</th>
                    <th>loan </th>
                    <th>Interest</th>
                    <th>type </th> 
                    <!-- <th>payed</th> -->
                    
                    <th>Loan date </th>
                    <th>Final Return date</th>
    				<th>Edit</th>
    				<th>Delete</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    
    			</tr>
                @foreach($abalatstypecredit as $abal)
    			<tr>
                     
        				<td>{{$abal->code}}</td>
        				<td>{{$abal->name}}</td>
        				<td>{{$abal->fname}} </td>
        				<td>{{$abal->gfname}}</td>
        			    <td> {{$abal->phone}} </td>
                        <td>{{$abal->amount}}</td>
                        <td>{{$abal->interest}}</td>
                        <td>{{$abal->type}}</td>
                        <td>{{$abal->creditDate}}</td>
                        <td> {{$abal->finalDate}} </td>
                        

                    

        			     <td><a href="typecreditedit/{{$abal->id}}" class="btn btn-info">Edit</a> </td>
                        <td><form action="typecreditdelete/{{$abal->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            
                        </form> 
                       
                    </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                       
                        
                        <!-- @endif -->
    			</tr>
                @endforeach
    		</table>
    	</div>
    </div>
    </div>
</div>
</div>
</div>

    </section>

 @endsection

 <!-- @section('scrip') -->