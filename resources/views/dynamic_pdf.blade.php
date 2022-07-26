@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of Abels</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/')}}">dashboard</a> </li>
    					<li class="breadcrumb-item active">Abels </li>
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
    			<a href="{{url('/pdff')}} " class="btn btn-primary"> pdf</a>
    		</p>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                
                <tr>
                    <th>name</th>

                    <th>fname</th>
                    <th>gfname</th>
                    <th>numdays</th>
                    <th>month</th>
                    <th>entry_date</th>
                    <th>total</th>
                    <th>Edit</th>
                   

                    <th class="col-xs-4">delete</th>
                </tr>
                @foreach($customerData as $abel)
                <tr>
                  
                   <td>{{$abel->name}} </td>
                    <td>{{$abel->fname}} </td>
                    <td>{{$abel->gfname}} </td>
                    <td>{{$abel->numdays}} </td>
                    <td>{{$abel->month}}</td>
                    <td>{{$abel->entrydate}} </td>
                    <td>{{$abel->total}} </td>
                    <td><a href="abeledit/{{$abel->id}}" class="btn btn-info">Edit</a> </td>
                        <td><form action="abeldelete/{{$abel->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">delete</button>
                            
                        </form> 
                       
                    </td>
                    
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