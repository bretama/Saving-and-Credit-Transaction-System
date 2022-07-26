@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">free-interest</h1>

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
                
            <form action="{{url('/freeinterestsearch')}}" method="get" role="search">
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
    			<a href="{{url('/freeinterestregister')}} " class="btn btn-primary">register free-interest</a>
    		</p>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Creator</th>
                    <th>Account Number</th>                   
                    <th>Amount</th>
                    <th>Bank</th>
                    <th>Recipt</th>
                    <th>month</th>
                    <th>entry date</th>
                   <th>child/not</th>
                    <th>edit</th>
                    <th>delete</th>
                    <th> </th>
                    <th>  </th>
                </tr>
                 @foreach($freeinterestsaving as $freeinterest)
                <tr>
                     <td>{{$freeinterest->username}} </td>
                    <td>{{$freeinterest->accountNum}}</td>
                    <td>{{$freeinterest->amount}}</td>
                    <td>{{$freeinterest->bank }}</td>
                    <td>{{$freeinterest->recipt}}</td>
                    <td>{{$freeinterest->month }}</td>
                    <td>{{$freeinterest->entrydate}}</td>
                    <td>{{$freeinterest->type}}</td>
        			     <td><a href="freeinterestedit/{{$freeinterest->id}}" class="btn btn-info">edit</a> </td>
        				<td><form action="freeinterestdelete/{{$freeinterest->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">delete</button>
                            
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