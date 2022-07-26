@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of teacoffees</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">dashboard</a> </li>
    					<li class="breadcrumb-item active">teacoffees </li>
    				</ol>
    			</div>
    		</div>
    	</div>

    </div>

    <section class="content">


    <div class="container">
        

    	<div class="container-fluid">
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="row">
            <div class="col-md-6">
                <form action="/search1" method="get">
                    <div class="form-group">
                        <input type="search" name="search" class="form-control">
                        <span class="form-group-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                </form>
            </div>
    	    <div class="col-md-2 text-right">
    			<a href="{{url('/teacoffeeregister')}} " class="btn btn-primary"> teacoffees regisration</a>
    	 </div>
        </div>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11"> 
                <tr>
                    <th>name</th>
                    <th>fname</th>
                    <th>gfname</th>
                    <th>type</th>
                    <th>number of types</th>
                    <th>Total</th>
                    <th>month</th>
                    <th>entry_date</th> 
                    <th>Edit</th>
                    <th class="col-xs-4">delete</th>
                </tr>
                @foreach($teacoffees as $teacoffee)
                <tr> 
                   <td>{{$teacoffee->name}} </td>
                    <td>{{$teacoffee->fname}} </td>
                    <td>{{$teacoffee->gfname}} </td>
                    <td>{{$teacoffee->type}} </td>
                     <td>{{$teacoffee->totalnum}} </td>
                    <td>{{$teacoffee->total}} </td>
                    <td>{{$teacoffee->month}}</td>
                    <td>{{$teacoffee->entrydate}} </td>
                    <td><a href="teacoffeeedit/{{$teacoffee->id}}" class="btn btn-info">Edit</a> </td>
                        <td><form action="teacoffeedelete/{{$teacoffee->id}}" method="post" class="delete-form"> {{csrf_field()}}
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