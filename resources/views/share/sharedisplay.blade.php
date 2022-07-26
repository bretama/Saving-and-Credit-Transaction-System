@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">share</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">Dashboard</a> </li>
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
                
            <form action="{{url('/searchshare')}}" method="get" role="search">
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
    			<a href="{{url('/shareregister')}} " class="btn btn-primary">Register share</a>
    		</p>
            <div class="container box">
                <h2 align="center"></h2><br>
                <div class="panel panel-default">
                 <!-- <a href="{{ URL::to('/customers/pdf') }}">Export PDF</a> -->
                <div class="table-responsive">
                   
        		<table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
               
                        <th>Code</th>
                        <th>Share</th>
                        <th>Bank</th>
                        <th>Recipt</th>
                        <th>Month</th>
                       <th>Entrydate</th>
                       
                        <th>Edit</th>
                        <th>Delete</th>
                      
                    </tr>
                    </thead>
                    @foreach($share as $shares)
                    <tr>
                        <td>{{$shares->accountNum}}</td>
                        <td>{{$shares->amount}}</td>
                        <td>{{$shares->bank}}</td>
                        <td>{{$shares->recipt}}
                        <td>{{$shares->month}}</td>
                        <td>{{$shares->entrydate}}</td>
                        <td><a href="shareedit/{{$shares->id}}" class="btn btn-info">edit</a> </td>
                        <td><form action="sharedelete/{{$shares->id}}" method="post" class="delete-form"> {{csrf_field()}}
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
</div>
</div>

 <script type="text/javascript">
 // $(document).ready(function(){
 //    $('#mytable').DataTable({
 //        processing:true,
 //        serverSide:true,
 //        ajax: {
 //          url:  "{{route('get.user')}}",
 //        },
 //        columns: [
 //        {data: 'id', name:'id'},
 //        {data: 'code', name:'code'},
 //        {data: 'amount', name:'amount'},
 //        {data: 'month', name:'month'},
 //        {data: 'entrydate', name:'entrydate'}
 //        ]
 //    });
 // });
</script>
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
 @push('scripts')
<script>
$(function() {
    $('#mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('shares') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'code', name: 'code' },
            { data: 'amount', name: 'amount' },
             {data: 'month',name: 'month'},
             {data: 'entrydate', name:'entrydate'}
           
        ]
    });
});
</script>
@endpush

 <!-- @section('script')
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
 @endsection -->