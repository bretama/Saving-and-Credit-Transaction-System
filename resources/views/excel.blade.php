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
    <img src="/images/{{ Session::get('path')}}" width="300" />
    @endif 
	<div class="form-group">
	
		<div class="alert" id="message" style="display: none;"></div>
	 <form method="post" id="upload_form" enctype="multipart/form-data" action="{{url('import')}}">
	{{csrf_field()}}
	<div class="form-group">
		<table class="table">
			<tr>
				<td width="40%" align="right"><label>Select File For Upload</label></td>
				<td width="30"><input type="file" name="select_file" id="select_file" /></td>
				<td width="30%" align="left"><input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload"></td>
			</tr>
			<tr>
				<td width="40%" align="right"></td>
				<td width="30"><span class="text-muted">.xls,.xslx</span></td>
				<td width="30%" align="left"></td>
			</tr>
		</table>
	</div>
</form>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">brhane's data</h3>
	</div>
	<dir class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped"> 
               <tr>
               	 <th>ID</th>
               	 <th>First name</th>
               	 <th>Middle name</th>
               	 <th>Last name</th>
               	 <th>Email</th>
               </tr>
               @foreach($data as $d)
               <tr>
               	<td>{{$d->id}}</td>
               	<td>{{$d->first_name}}</td>
               	<td>{{$d->middle_name}}</td>
               	<td>{{$d->last_name}}</td>
               	<td>{{$d->email}}</td>
               </tr>
               @endforeach
			</table>
		</div>
	</dir>
</div>
</div>




</body>
</html>