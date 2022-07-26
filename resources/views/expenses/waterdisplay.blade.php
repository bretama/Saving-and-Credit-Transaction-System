@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of waters</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">dashboard</a> </li>
    					<li class="breadcrumb-item active">waters </li>
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
    		<p>
    			<a href="{{url('/waterregister')}} " class="btn btn-primary"> waters regisration</a>
    		</p>
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="full_text_search" id="full_text_search" class="form-control" placeholder="Search" value="">
                </div>
                <div class="col-md-2">
                    @csrf
                    <button type="button" name="search" id="search" class="btn btn-success">Search</button>
                </div>
            </div>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11"> 
                <thead>
                <tr>
                    <th>name</th>
                    <th>fname</th>
                    <th>gfname</th>
                    <th>numbers bought</th>
                    <th>Total</th>
                    <th>month</th>
                    <th>entry_date</th> 
                    <th>Edit</th>
                    <th class="col-xs-4">delete</th>
                </tr>
            </thead>
               <!--  @foreach($waters as $water)
                <tr> 
                   <td>{{$water->name}} </td>
                    <td>{{$water->fname}} </td>
                    <td>{{$water->gfname}} </td>
                     <td>{{$water->number}} </td>
                    <td>{{$water->total}} </td>
                    <td>{{$water->month}}</td>
                    <td>{{$water->entrydate}} </td>
                    <td><a href="wateredit/{{$water->id}}" class="btn btn-info">Edit</a> </td>
                        <td><form action="waterdelete/{{$water->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">delete</button>
                            
                        </form> 
                       
                    </td>
                    
                </tr> -->
                <!-- @endforeach -->
                <tbody></tbody>
         
                
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

 @section('script')
<script type="text/javascript">
    $(document).ready(function(){
        load_data('');
        function load_data(full_text_search_query = '')
        {
            var _token = $("input[name=_token").val();
            $.ajax({
                url:"{{route('full-text-search.action')}}",
                method:"POST",
                data:{full_text_search_query:
                    full_text_search_query, _token:_token},
                    dataType:"json",
                    success:function(data)
                    {
                        var output = '';
                        if (data.length > 0) {
                            for (var count = 0; count < data.length; count++) {
                                output += '<tr>';
                                output += '<td>' +data[count].name +'</td>';
                                 output += '<td>' +data[count].fname +'</td>';
                                  output += '<td>' +data[count].gfname +'</td>';
                                   output += '<td>' +data[count].number +'</td>';
                                    output += '<td>' +data[count].total +'</td>';
                                     output += '<td>' +data[count].entrydate +'</td>';
                                      output += '</tr>';
                            }
                        }
                        else{
                             output += '<tr>';
                              output += '<td colspan="6">No data found</td>';
                               output += '</tr>';
                        }
                        $('tbody').html(output)
                    }
            });
        }
        $('#search').click(function(){
            var full_text_search_query = $('#full_text_search').val();
            load_data(full_text_search_query);
        });
    });
</script>
 @endsection