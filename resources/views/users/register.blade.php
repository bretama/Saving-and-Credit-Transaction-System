@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of members</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/listofmembers')}}">list of members</a> </li>
    					<li class="breadcrumb-item active"></li>
    				</ol>
    			</div>
    		</div>
    	</div>

    </div>

    
<div class="box">
<div id="myTabContent" class="main_container" >

<section class="content">
    <div class="container">
    	<div class="jumbotron">
    		<form method="post" action="/register" enctype="multipart/form-data">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">register members</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
         
        <div class="form-group">
          <div class="row">
            <label for="name" class="col-md-3">name:</label>
            <div class="col-md-6"><input type="text" class="form-control" id="name" name="name"></div>
        </div>
      </div>
        <div class="form-group">
            <div class="row">
              <label class="col-md-3">fname</label>
              <div class="col-md-6"><input type="text" name="fname" id="fname" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">gfname</label>
              <div class="col-md-6"><input type="text" name="gfname" id="gfname" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Username</label>
                        <div class="col-md-6"><input type="text" name="username" id="username" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                 <div class="form-group">
            <div class="row">
              <label class="col-md-3">Password</label>
              <div class="col-md-6"><input type="password" name="password" id="password" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Confirm password</label>
                        <div class="col-md-6"><input type="password" name="cpassword" id="cpassword" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>


</div>


            </div>

        </div>

<div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-block btn-success">save</button>
                                </div>
                            </div>
    		</form>
      </div>
        </div>
    		</section>	
    	</div>
  
</div>
    
 @endsection