@extends('layouts.admin')

@section('content')
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

</head>
<!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">Submembers</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/submemberdisplay')}}">Submembers</a> </li>
    					<li class="breadcrumb-item active">Submembers</li>
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
    		<form method="post" action="{{url('/submemberregister1')}}">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Materials</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
             
            
            <div class="form-group">
                  <label class="control-label col-sm-3" for="month">Code of Super:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control chosen" name="code" required="required">
                      <option selected disabled>~Choose~</option>
                      @foreach($abalats as $abalat)
                      <option >{{$abalat->code}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
                  <br>
                  <br>
               <div class="form-group">
                  <label class="control-label col-sm-3" for="">Name of Submember:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control chosen" name="name" id="name" required="required">
                      <option selected disabled>~Choose~</option>
                      @foreach($abalats as $abalat)
                      <option >{{$abalat->name}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
                  <br>
                  <br>
               <div class="form-group">
                  <label class="control-label col-sm-3" for="month">Father's name of Submember:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control chosen" name="fname" id="fname" required="required">
                      <option selected disabled>~Choose~</option>
                      @foreach($abalats as $abalat)
                      <option >{{$abalat->fname}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
              <br><br>
                <div class="form-group">
                <label class="col-md-3 control-label" for="">Entry Date</label>
                <div class="col-md-6">
                  <input id="entrydate" name="entrydate" type="date" placeholder="" class="form-control" value=""></div>
                </div>
              
                  <br>
                  <br>
       

</div>


            </div>

        </div>

<div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-block btn-success">Save</button>
                                </div>
                            </div>
    		</form>
        </div>
    		</section>	
    	</div>
  
</div>
    

    <script type="text/javascript">
     $(".chosen").chosen();
   </script> 
 @endsection