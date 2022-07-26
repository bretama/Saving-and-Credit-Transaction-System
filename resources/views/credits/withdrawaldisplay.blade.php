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
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">dashboard</a> </li>
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
    			<a href="{{url('/withdrawalregister')}} " class="btn btn-primary"> withdrow </a>
    		</p>


            <div class="table-responsive">
    		<table class="table table-bordered table-striped">
    			<tr>
    				<th>code</th>
                    <th>Amount Taken</th>
                    <th>Month</th>
                   
                    <th>Remain</th>
                    <th>Withdrawal date</th>
                    <th>Type</th>
    				<th>Edit</th>
    				<th>delete</th>
                  
                    
    			</tr>
                @foreach($withdrawals as $abal)
    			<tr>
                    
        				<td>{{$abal->code}}</td>
        				<td>{{$abal->amount}}</td>
                        <td>{{$abal->month}}</td>
        				<td>{{$abal->remain}} </td>
        				<td>{{$abal->withdrawalDate}}</td>
        			    <td>{{$abal->type}}</td>
                        

                    <td><a href="withdrawaledit/{{$abal->id}}" class="btn btn-info">edit</a> </td>
                        <td><form action="withdrawaldelete/{{$abal->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">delete</button>
                            
                        </form> 
                       
                    </td>
                      
    			</tr>
                @endforeach
    		</table>

            
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