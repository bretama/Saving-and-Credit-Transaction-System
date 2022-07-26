@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark"></h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/abaldisplay')}}">abalats</a> </li>
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
    	@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    		<form method="GET" action="{{url('/notsaved1')}}">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">.</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
                       <div class="form-group">
                 
                 <div class="form-group">
                <label class="col-md-3 control-label" for="date">firstdate</label>
                <div class="col-md-6">
                  <input id="firstdate" name="firstdate" type="tex" placeholder="" class="form-control" value="" required=""></div>
                  <!-- <div class="fa fa-calendar"></div> -->
                </div>
                <br>
                <br>
                <div class="form-group">
                <label class="col-md-3 control-label" for="date">lastdate</label>
                <div class="col-md-6">
                  <input id="lastdate" name="lastdate" type="text" placeholder="" class="form-control" value="" required=""></div>
                  <!-- <div class="fa fa-calendar"></div> -->
                </div>
                <br>
                <br>
                <button type="submit" class="align-right btn btn-block btn-success">displa.</button>
                  </div>
              </div>
              <br>
              <br>
</div>


            </div>

        </div>
    		</form>

        
        </div>
    		</section>	
    	</div>
  
</div>
    
 @endsection