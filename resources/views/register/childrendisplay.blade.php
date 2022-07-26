@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of childrens saving</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">dash board</a> </li>
    					<li class="breadcrumb-item active">childrens saving registeration </li>
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
                
            <form action="{{url('/childrensearch')}}" method="get" role="search">
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
    			<a href="{{url('/childrenregister')}} " class="btn btn-primary"> childrens saving regisration</a>
    		</p>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                
                <tr>
                    <th>Creator</th>
                    <th>Account Number</th>
                    <th>Amount</th>
                    <th>Bank deposited</th>
                   
                    <th>interest</th>
                    <th>month</th>
                    <th>entry date</th>
                    <th>edit</th>
                    <th class="col-xs-4">delete</th>
                </tr>
                @foreach($children as $child)
                <tr>
                  <td>{{$child->username}} </td>
                   <td>{{$child->accountNum}} </td>
                   <td>{{$child->amount}} </td>
                   <td>{{$child->bank}}</td>
                  
                    <td>{{$child->interest}} </td>
                    <td>{{$child->month}}</td>
                    <td>{{$child->entrydate}} </td>
                    <td><a href="childrenedit/{{$child->id}}" class="btn btn-info">edit</a> </td>
                        <td><form action="childrendelete/{{$child->id}}" method="post" class="delete-form"> {{csrf_field()}}
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