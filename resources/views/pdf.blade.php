<!DOCTYPE html>
<html>
<head>
	<title>Autocomplete text box</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<br>
<div class="container">
	<h3 align="center">Autocomplete Textbox</h3><br>
	<br>
	   @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success')}}</p>
    </div>
    <!-- <img src="/images/{{ Session::get('path')}}" width="300" /> -->
    @endif 
	<!-- <div class="form-group">
	
		<div class="alert" id="message" style="display: none;"></div>
	 <form method="post" id="upload_form" enctype="multipart/form-data" action="{{url('import')}}"> -->
	 <div class="col-md-7" align="right">
	 	<h3>Customer Data</h3>
	 </div>
	 
	
	

<br>

		<div class="table-responsive">
			<table class="table table-bordered table-striped"> 
               <tr>
               	 <th>ID</th>
               	 <th>First name</th>
               	 <th>Middle name</th>
               	 <th>Last name</th>
               	 <th>Email</th>
               </tr>
               @foreach($customer_data as $d)
               <tr>
               	<td>{{$d->id}}</td>
               	<td>{{$d->first_name}}</td>
               	<td>{{$d->middle_name}}</td>
               	<td>{{$d->last_name}}</td>
               	<td>{{$d->email}}</td>
               </tr>
               @endforeach
			</table>
			<div class="col-md-5" align="right">
	 	<a href="{{url('pdff')}}" class="btn btn-danger">Convert into PDF</a>
	 </div>
		</div>
	</dir>
</div>
</div>
</body>
</html>