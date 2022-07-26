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
    					<li class="breadcrumb-item"> <a href="{{url('/typecreditdisplay')}}">Members who have taken Loan</a> </li>
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
    	
    		<form method="post" action="/typecreditupdate/{{$edit->id}}">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit type Loan</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
                       <div class="form-group">
                  <label class="control-label col-sm-3" for="month">code:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="code" value="{{$edit->code}}" id="code" required="required">
                      <option selected disabled>~c
                      Choose~</option>
                      @foreach($abalats as $abalat)
                      <option >{{$abalat->code}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
              <br>
              <br>
             <div class="form-group">
              <label class="col-md-3 control-label" for="total">Amount Loan</label>
              <div class="col-md-6">
                <input id="amount" name="amount" type="text" value="{{$edit->amount}}" placeholder="" class="form-control" required=""></div>
              </div>
              <br>
              <br>
              
              <div class="form-group">
                  <label class="control-label col-sm-3" for="month">Month:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="month" value="{{$edit->month}}" id="month" required="required">
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
                 
               <div class="form-group">
                <label class="col-md-3 control-label" for="date">credit daate</label>
                <div class="col-md-6">
                  <input id="creditDate" name="creditDate" value="{{$edit->creditDate}}" type="date" placeholder="" class="form-control" value="" required=""></div>
                  <div class="fa fa-calendar"></div>
                </div>
                <br>
                <br>
                
                 <div class="form-group">
                  <label class="control-label col-md-3" for="occupation">final return-date:<span class="text-danger">*</span></label>
                   <div class="col-md-6">
                  <input id="finalDate" name="finalDate" type="date" value="{{$edit->finalDate}}" placeholder="" class="form-control" value=""></div>
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
    
 @endsection