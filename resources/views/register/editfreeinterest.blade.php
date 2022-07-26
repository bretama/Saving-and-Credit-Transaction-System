@extends('layouts.admin')

@section('content')
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

</head>
<!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-1">
    			<div class="col-sm-3">
    				<h1 class="m-0 text-dark">list of members</h1>

    			</div>
    			<div class="col-sm-3">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/monthlydisplay')}}">see free interest list</a> </li>
    					<li class="breadcrumb-item active">free interest list</li>
    				</ol>
    			</div>
    		</div>
    	</div>

    </div>

    
<!-- <div class="box"> -->
<div id="myTabContent" class="main_container" >

<section class="content">
    <div class="container">
    	
    		<form method="post" action="{{url('/freeinterestupdate')}}/{{$edit->id}}">
                <div class="col-md-11">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h1 class="box-title">registe free interest deposit</h1>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
                       <div class="form-group">
                  <label class="control-label col-sm-1" for="month">code:<span class="text-danger">*</span></label>
              <div class="col-md-3">
                    <select class="form-control chosen" name="code" value="{{$edit->code}}" id="code" required="required">
                      <option selected disabled>~choose~</option>
                      @foreach($abalats as $abalat)
                      <option >{{$abalat->code}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
              <br>
              <br>
             <div class="form-group">
              <label class="col-md-1 control-label" for="total">Amount</label>
              <div class="col-md-3">
                <input id="amount" name="amount" value="{{$edit->amount}}" type="text" placeholder="" class="form-control" required=""></div>
              </div>
              <br>
              <br>
                <div class="form-group">
              <label class="col-md-1 control-label" for="bank">bank deposited</label>
              <div class="col-md-3">
                <input id="bank" name="bank" type="text" value="{{$edit->bank}}" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-1 control-label" for="recipt">Recipt</label>
              <div class="col-md-3">
                <input id="recipt" name="recipt" value="{{$edit->recipt}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-1 control-label" for="sem">for head office</label>
              <div class="col-md-3">
                <input id="sem1" name="sem1" value="{{$edit->sem1}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
                  <label class="control-label col-sm-1" for="month">month:<span class="text-danger">*</span></label>
              <div class="col-md-3">
                    <select class="form-control chosen" value="{{$edit->month}}" name="month" id="month" required="required">
                      <option selected disabled>~choose~</option>
                      <option >september</option>
                      <option >october</option>
                      <option >november</option>
                      <option >december</option>
                      <option >january</option>
                      <option >february</option>
                      <option >murch</option>
                      <option >april</option>
                      <option >may</option>
                      <option >june</option>
                      <option >jully</option>
                      <option >augest</option>
                </select>
                  </div>
              </div>
                  <br>
                  <br>
               <div class="form-group">
                <label class="col-md-1 control-label" for="date">entry date</label>
                <div class="col-md-3">
                  <input id="entrydate" name="entrydate" value="{{$edit->entrydate}}" type="date" placeholder="" class="form-control" value="" required=""></div>
                  <div class="fa fa-calendar"></div>
                </div>
                <br>
                <br>
                
                <div class="form-group">
                  <label class="control-label col-sm-1" for="status">type:<span class="text-danger">*</span></label>
              <div class="col-md-3">
                    <select class="form-control" value="{{$edit->type}}" name="type" id="type" required="required">
                      <option selected disabled>~choose~</option>
                      <option >child</option>
                      <option >mature</option>
                      
                </select>
                  </div>
              </div>
              <br>
              <br>
               
                <div class="form-group">
                  <label class="control-label col-sm-1" for="status">status:<span class="text-danger">*</span></label>
              <div class="col-md-3">
                    <select class="form-control" name="status" value="{{$edit->status}}" id="status" required="required">
                      <option selected disabled>~choose~</option>
                      <option >0</option>
                      <option >1</option>
                      <option >1</option>
                </select>
                  </div>
              </div>
                
               
<!--                 <div class="form-group">
                  <label class="control-label col-md-1" for="leave">ዝወፀሉ ዕለት:<span class="text-danger">*</span></label>
                   <div class="col-md-3">
                  <input id="leave" name="leave" type="text" placeholder="" class="form-control" value=""></div>
                </div> -->
       <!--          <div class="form-group">
        <label for="">Simple Date &amp; Time</label>
          <div class='input-group date' id='example1'>
              <input type='text' class="form-control" />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
      </div> -->

</div>


            </div>

    

<div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-3 col-sm-3 col-xs-11 col-md-offset-1">
                                    <button type="submit" class="btn btn-block btn-success">correct it</button>
                                </div>
                            </div>
    		</form>
        </div>
      </div>
    		</section>	
    	<!-- </div> -->

</div>
     <script type="text/javascript">
     $(".chosen").chosen();
   </script> 
 @endsection