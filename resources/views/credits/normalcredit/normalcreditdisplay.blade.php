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
                
            <form action="{{url('/normalsearch')}}" method="get" role="search">
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
    			<a href="{{url('/normalcreditregister')}} " class="btn btn-primary"> register normal-credit</a>
    		</p>


            <div class="table-responsive">
    		<table class="table table-bordered table-striped">
    			<tr>
                    <th>Normal credit id</th>
    				<th>code</th>
    				<!-- <th>name</th> -->

                    <th>loan </th>

                    
                    <th>loan date </th>
                    <th>first return-date</th>
                    <th>final return date</th>
    				<th>update</th>
    				<th>delete</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    
    			</tr>
                @foreach($abalatsnormalcredit as $abal)
    			<tr>
                    
                      
        				<td>{{$abal->idnum}}</td>
        				<td>{{$abal->accountNum}}</td>
                        <td>{{$abal->amount}}</td>
                    
                        <td>{{$abal->creditDate}}</td>
                        <td>{{$abal->firstDate}}</td>
                        <td> {{$abal->finalDate}} </td>
                        

                   <td><a href="normalcreditedit/{{$abal->id}}" class="btn btn-info">edit</a> </td>
                        <td><form action="normalcreditdelete/{{$abal->id}}" method="post" class="delete-form"> {{csrf_field()}}
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

 