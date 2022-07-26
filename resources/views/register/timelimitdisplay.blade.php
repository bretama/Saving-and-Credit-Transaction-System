@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">Time-limited saving members</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">Dashboard</a> </li>
    					<li class="breadcrumb-item active">Time-limited</li>
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
            <div class="col-md-6" align="right">
                
            <form action="{{url('/timelimitedsearch')}}" method="get" role="search">
            {{ csrf_field() }}
            <div class="input-group col-md-4" align="right">
                <input type="text" class="col-md-2 form-control" name="search"
                    placeholder="Search users"> 
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>

                   
            </div>
    		<p>
    			<a href="{{url('/timelimitregister')}} " class="btn btn-primary"> Register Timelimited</a>
    		</p>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Account Number</th>

                    <th>Amount</th>
                   <th>Bank</th>
                   <th>Recipt</th>
                    <th>Month</th>
                    <th>Entry date</th>
                    <th>Leave date</th>
                     <th>Interest</th>
                     <th>Total Balance</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th> </th>
                    <th>  </th>
                </tr>
                 @foreach($timelimitsaving as $timelimit)
                <tr>
                    <td>{{$timelimit->accountNum}}</td>
                    <td>{{$timelimit->amount}} </td>
                    <td>{{$timelimit->bank}}</td>
                    <td>{{$timelimit->recipt}}</td>
                    <td>{{$timelimit->month }}</td>
                    <td>{{$timelimit->entrydate}}</td>
                      <td>{{$timelimit->leavedate}}</td>
                    <td>{{$timelimit->interest}}</td>
                      <td>{{$timelimit->total}}</td>
                   
                  

                    

        			     <td><a href="timelimitedit/{{$timelimit->id}}" class="btn btn-info">Edit</a> </td>
        				<td><form action="timelimitdelete/{{$timelimit->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            
                        </form> 
                       
                    </td>
                        <td>  </td>
                        <td> </td>
                        
                        
                        
    			</tr>
                @endforeach
    		</table>
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