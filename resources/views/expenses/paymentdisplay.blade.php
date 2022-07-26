@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of Payments</h1>
    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">dashboard</a> </li>
    					<li class="breadcrumb-item active">Payments </li>
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
    			<a href="{{url('/paymentregister')}} " class="btn btn-primary"> Payments regisration</a>
    		</p>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="user_table"> 
                <thead>
                <tr>
                    <th>name</th>
                    <th>fname</th>
                    <th>gfname</th>
                    <th>Days</th>
                    <th>Basic salary</th>
                    <th>month</th>
                    <th>entry_date</th> 
                    <th>Edit</th>
                    <th class="col-xs-4">Delete</th>
                </tr>
                </thead>
              <!-- @foreach($payments as $payment)
                <tr> 
                   <td>{{$payment->name}} </td>
                    <td>{{$payment->fname}} </td>
                    <td>{{$payment->gfname}} </td>
                    <td>{{$payment->days}} </td>
                    <td>{{$payment->basicSalary}} </td>
                    <td>{{$payment->month}}</td>
                    <td>{{$payment->entrydate}} </td>
                    <td><a href="paymentedit/{{$payment->id}}" class="btn btn-info">Edit</a> </td>
                        <td><form action="paymentdelete/{{$payment->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">delete</button>
                            
                        </form> 
                       
                    </td>
                    
                </tr>
                @endforeach
          </table> -->
                
    		</table>
    	</div>
    </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('sample.index')}}",
            },
            columns: [
              {
                data: 'name',
                name: 'name'
              },
              {
                data: 'fname',
                name: 'fname'
              },
              {
                data: 'days',
                name: 'days'
              },
              {
                data: 'basicSalary',
                name: 'basicSalary'
              },
              {
                data: 'month',
                name: 'month'
              },
              {
                data: 'entrydate',
                name: 'entrydate'

              }{
                data: 'action',
                name: 'action',
                orderable: false
              }
            ]
        });
    });
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
    

 @endsection

 <!-- @section('scrip') -->