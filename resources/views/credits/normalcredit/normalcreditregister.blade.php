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
    				<h1 class="m-0 text-dark"></h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/normalcreditdisplay')}}">lists of credits</a> </li>
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
    	
    		<form method="post" action="{{url('/normalcreditregister1')}}">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">register credit</h3>
        </div>
        
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
                  @foreach($abalats as $abal)
                  @if($abal->code==$id)
                   <div class="pull-left">
           <img src="{{asset('uploads/members/' . $abal->image)}}" width="100px;" height="100px;" alt="Image" class="img-circle" />
         </div>
             <!-- <div class="form-group">
              <label class="col-md-3 control-label" for="total">Normal id</label>
              <div class="col-md-6">
                <input id="id" name="id" type="text" value="" placeholder="" class="form-control" value="" required=""></div>
              </div>
              <br>
              <br>    -->
             <div class="form-group">
              <label class="col-md-3 control-label" for="total">Code</label>
              <div class="col-md-6">
                <input id="code" name="code" type="text" value="{{$abal->code}}" placeholder="" class="form-control" value="" required=""></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="total">amount</label>
              <div class="col-md-6">
                <input id="amount" name="amount" type="text" value="" placeholder="" class="form-control" value="" required=""></div>
              </div>
              <br>
              <br>
              <div class="form-group">
                  <label class="col-md-3 control-label" for="bank">bank deposited</label>
              <div class="col-md-6">
                    <select class="form-control chosen" name="bank" id="bank" required="required">
                      <option selected disabled>~choose~</option>
               
                      <option >Lion</option>
                      <option >Awash</option>s
                      <option >Union</option>
                      <option >Berhan</option>
                      <option >Abyssinia</option>
                      <option >CBE</option>
                      <option >Wegagen</option>
                      <option >Dashen</option>
                      <option >Abay</option>
                    
                </select>
                  </div>
              </div>
                  <br>
                  <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="total">name</label>
              <div class="col-md-6">
                <input id="name" name="name" type="text" value="{{$abal->name}}" placeholder="" class="form-control" value="" required=""></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="total">fname</label>
              <div class="col-md-6">
                <input id="fname" name="fname" type="text" value="{{$abal->fname}}" placeholder="" class="form-control" value="" required=""></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="total">phone</label>
              <div class="col-md-6">
                <input id="phone" name="phone" type="text" value="{{$abal->phone}}" placeholder="" class="form-control" value="" required=""></div>
              </div>
              <br>
              <br>

               <div class="form-group">
              <label class="col-md-3 control-label" for="total">qebelie</label>
              <div class="col-md-6">
                <input id="qebelie" name="qebelie" type="text" value="{{$abal->qebelie}}" placeholder="" class="form-control" value="" required=""></div>
              </div>
              <br>
              <br>
              
              <div class="form-group">
                  <label class="control-label col-sm-3"  for="month">month:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control chosen" name="month" value="<?php foreach($abalats as $abal){if($abal->id==$id ){echo($abal->name);}} ?>"  id="month" required="required">
                      <option selected disabled>~Choose~</option>
                      <option >September</option>
                      <option >October</option>
                      <option >November</option>
                      <option >December</option>
                      <option >January</option>
                      <option >February</option>
                      <option >March</option>
                      <option >April</option>
                      <option >May</option>
                      <option >June</option>
                      <option >July</option>
                      <option >Auguest</option>
                </select>
                  </div>
              </div>
                  <br>
                  <br>
                  <!-- <div class="form-group">
              <label class="col-md-3 control-label" for="total">Payed Amount</label>
              <div class="col-md-6">
                <input id="pamount" name="pamount" type="text" placeholder="" class="form-control" required=""></div>
              </div>
              <br>
              <br> -->
               <div class="form-group">
                <label class="col-md-3 control-label" for="date">credit-date</label>
                <div class="col-md-6">
                  <input id="creditDate" name="creditDate" type="date" placeholder="" class="form-control" value="" required=""></div>
                  <div class="fa fa-calendar"></div>
                </div>
                <br>
                <br>
               <div class="form-group">
                <label class="col-md-3 control-label" for="date">first return time</label>
                <div class="col-md-6">
                  <input id="firstDate" name="firstDate" type="date" placeholder="" class="form-control" value="" required=""></div>
                  <div class="fa fa-calendar"></div>
                </div>
                <br>
                <br>
                
                 <div class="form-group">
                  <label class="control-label col-md-3" for="occupation">final return-time:<span class="text-danger">*</span></label>
                   <div class="col-md-6">
                  <input id="finalDate" name="finalDate" type="date" placeholder="" class="form-control" value=""></div>
                </div>
                <br>
                <br>
                @endif
                @endforeach
                <div class="form-group">
                  <label class="control-label col-sm-3"  for="month">Type of Credit:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="normal"   id="normal" required="required">
                      <option selected disabled>~Choose~</option>
                      <option >normal</option>
                      <option >type</option>

                </select>
                  </div>
              </div>
                  <br>
                  <br>
                  <div class="form-group">
                  <label class="control-label col-sm-3"  for="month">Terms of loan:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="term"   id="term" required="required">
                      <option selected disabled>~Choose~</option>
                      <option >short</option>
                      <option >long</option>

                </select>
                  </div>
              </div>
                  <br>
                  <br>
                  <div class="form-group">
                  <label class="control-label col-sm-3"  for="month">Type of type credit:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="type"   id="type" required="required">
                      <option selected disabled>~Choose~</option>
                      <option >car</option>
                      <option >house_material</option>
                      <option>machine</option>

                </select>
                  </div>
              </div>
                  <br>
                  <br>
<!--                 <div class="form-group">
                  <label class="control-label col-md-3" for="leave">ዝወፀሉ ዕለት:<span class="text-danger">*</span></label>
                   <div class="col-md-6">
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

        </div>

<div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-block btn-success">save</button>
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