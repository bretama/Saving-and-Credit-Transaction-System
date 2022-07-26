@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of submembers</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">dashboard</a> </li>
    					<li class="breadcrumb-item active">list of submember</li>
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
                
            <form action="{{url('/submembersearch')}}" method="get" role="search">
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
                <tr>
    			<a href="{{url('/submemberregister')}} " class="btn btn-primary"> register submember</a>
                 <!-- <a href="{{url('/dynamic_pdf/pdf')}}" class="btn btn-danger" align="right">convert to pdf</a> -->
             </tr>
    		</p>
            
            
      
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                <tr>
                    <th>Account Number of super</th>

                    
                   
                    <th>name of submember</th>
                    <th>fathers name of submember</th>
                    <th>Entry date</th>
                   
                    <th>edit</th>
                    <th class="col-xs-4">delete</th>

                </tr>
                
                @foreach($abalats as $penality)
                <tr>
                   <td>{{$penality->accountNum}}</td>
                    <td>{{$penality->name}} </td>
                    <td>{{$penality->fname}}</td>
                      <td>{{$penality->entrydate}}</td>
                      <td><a href="submemberedit/{{$penality->id}}" class="btn btn-info">Edit</a> </td>
                        <td><form action="submemberdelete/{{$penality->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            
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