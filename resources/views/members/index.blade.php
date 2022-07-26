@extends('layouts.admin')
@section('content')

<section class="content-header">
      <h1>
        Registration
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Registration</li>
      </ol>
    </section>
    <section class="content">
    	<div class="container-fluid">
    		<p>
    			<a href="{{ url('addstd') }}" class="btn btn-primary">Add New student</a>
    		</p>
    		<table class="table table-bordered table-striped">
    			<tr>
    				<th>ID</th>
    				<th>First name</th>
                    <th>Middle name</th>
    				<th>Last name</th>
                    <th>Email</th>
    			</tr>
    			@foreach($students as $c)
    			<tr>
    				<td>{{$c->id}}</td>
    				<td>{{$c->first_name}}</td>
                    <td>{{$c->middle_name}}</td>
                    <td>{{$c->last_name}}</td>
                    <td>{{$c->email}}</td>
    				<td><a href="#" class="btn btn-info">Edit</a>
                        
    					<a href="#" class="btn btn-danger">Delete</a>
                    
    				</td>
    				{{ csrf_field() }}
    			</tr>
    			@endforeach
    		</table>
    	</div>
    </section>

@endsection