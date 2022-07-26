@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">Monthly savings</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">Dashboard</a> </li>
    					<li class="breadcrumb-item active">Monthly savings</li>
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
                
            <form action="{{url('/monthlysearch')}}" method="get" role="search">
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
             
    			<a href="{{url('/monthlyregister')}} " class="btn btn-primary">Register Monthly</a>
    		</p>
            <div class="container box">
                <h2 align="center"></h2><br>
                <div class="panel panel-default">
                 <!-- <a href="{{ URL::to('/customers') }}">Export PDF</a> -->
                <div class="table-responsive">
                   
        		<table class="table table-bordered table-striped" id="table11">
                    <thead>
                        <tr>
                        <!-- <th>Image</th> -->
                        <th>Creator</th>
                        <th>Account</th>
                        <th>Amount</th>
                        <th>Share</th>
                        <th>Saving</th>
                        <th>Bank</th>
                        <th>operation</th>
                        <th>Month</th>
                       <th>Entrydate</th>
                        <th>Interest</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      
                    </tr>
                    </thead>
                     @foreach($monthlysaving as $monthly)
                    <tr>
                         <td>{{$monthly->username}}</td>
                        <td>{{$monthly->accountNum}}</td>
                        <td>{{$monthly->amount}}</td>
                         <td>{{$monthly->share }} </td>
                        <td>{{$monthly->saving}} </td>
                 
                        <td>{{$monthly->bank}}</td>
                        <td>{{$monthly->sem1}}</td>
                        <td>{{$monthly->month }}</td>
                        <td>{{$monthly->entrydate}}</td>
                        <td>{{$monthly->interest}}</td>
                      
            			     <td><a href="monthlyedit/{{$monthly->id}}" class="btn btn-info">Edit</a> </td>
            				<td><form action="monthlydelete/{{$monthly->id}}" method="post" class="delete-form"> {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                
                            </form> 
                           
                        </td>
                            <td>  </td>
                            <td> </td>
                            
                            
                            
        			</tr>
                @endforeach
                <tbody>
                    
                </tbody>
    		</table>
            <div class="text-sm-right">
               
            </div>
    	</div>
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

 @section('script')
 <script type="text/javascript">
 $(document).ready(function(){();
    fetch_monthlysaving();
    function fetch_monthlysaving(query = '')
    {
    $.ajax({
        url:"{{ route('live_search.action')}}",
        method:"GET",
        data:{query:query},
        dataType:'json'
        success:function(data)
        {
            $('tbody').html(data.table_data);
            $('#total-records').text(data.total_data);
        }
    })
}
 })
</script>
 @endsection