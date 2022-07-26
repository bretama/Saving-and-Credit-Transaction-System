@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">List of Investment saving</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">Dashboard</a> </li>
    					<li class="breadcrumb-item active">investment</li>
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
                
            <form action="{{url('/investmentsearch')}}" method="get" role="search">
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
    			<a href="{{url('/investmentregister')}} " class="btn btn-primary"> Register investment</a>
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
                   
                    <th>Edit</th>
                    <th>Delete</th>
                    <th> </th>
                    <th>  </th>
                </tr>
                 @foreach($investmentsaving as $investment)
                <tr>
                    <td>{{$investment->accountNum}}</td>
                    <td>{{$investment->amount}} </td>
                    <td>{{$investment->bank}}</td>
                    <td>{{$investment->recipt}}</td>
                    <td>{{$investment->month }}</td>
                    <td>{{$investment->entrydate}}</td>
                   

                    

        			     <td><a href="investmentedit/{{$investment->id}}" class="btn btn-info">Edit</a> </td>
                        <td><form action="investmentdelete/{{$investment->id}}" method="post" class="delete-form"> {{csrf_field()}}
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