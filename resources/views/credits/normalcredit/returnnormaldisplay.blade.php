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
            <div class="col-md-6" align="right">
                
            <form action="{{url('/returnnormalsearch')}}" method="get" role="search">
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
    			<a href="{{url('/returnnormalregister')}} " class="btn btn-primary"> registr return credit</a>
    		</p>


            <div class="table-responsive">
    		<table class="table table-bordered table-striped">
    			<tr>
                    
    				<!-- <th>code</th> -->
                    <th>Normal id</th>
                    <th>Amount</th>
                    <th>Bank</th>
              
                    <th>Month</th>
                    <th>Entry date</th>
                    <th>Remain Amount</th>
    				<th>Edit</th>
    				<th>delete</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    
    			</tr>
                @foreach($returnnormals as $normal)
    			<tr>
                        
                        <th>{{$normal->normal_id}} </th>
        				<td>{{$normal->amount}} </td>
                        <td>{{$normal->bank}}</td>
                       
        				<td>{{$normal->month}}</td>
        			    <td> {{$normal->creditDate}} </td>
                        <td> {{$normal->remain}} </td>
                        
                        

                     <td><a href="returnnormaledit/{{$normal->id}}" class="btn btn-info">edit</a> </td>
                        <td><form action="returnnormaldelete/{{$normal->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">delete</button>
                            
                        </form> 
                       
                    </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                      
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