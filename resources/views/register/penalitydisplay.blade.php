@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">Penality List</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/')}}">Dashboard</a> </li>
    					<li class="breadcrumb-item active">Penality</li>
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
                
            <form action="{{url('/penalitysearch')}}" method="get" role="search">
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
    			<a href="{{url('/penalityregister')}} " class="btn btn-primary">Register Penality</a>
    		</p>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Account Number</th>
                    <th>Penality</th>
                    <th>Bank</th>
               
                    <th>Entry date</th>
                    <th>Month</th>
                    <th>Type of Saving/Loan</th>

                    
                    <th>Edit</th>
                    <th>Delete</th>
                    <th> </th>
                    <th>  </th>
                </tr>
                 @foreach($penalities as $penality)
                <tr>
                    <td>{{$penality->accountNum}}</td>
                    <td>{{$penality->penality}} </td>
                    <td>{{$penality->bank}}</td>
                    
                    <td>{{$penality->entrydate}}</td>
                    <td>{{$penality->month}}</td>
                    <td>{{$penality->type}}</td>
                  

                    

                       <td><a href="penalityedit/{{$penality->id}}" class="btn btn-info">Edit</a> </td>
                        <td><form action="penalitydelete/{{$penality->id}}" method="post" class="delete-form"> {{csrf_field()}}
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