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
            <h1 class="m-0 text-dark">return normal credit register</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{url('/returnnormaldisplay')}}">list of normal credit returns</a> </li>
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
        <form method="post" action="{{url('/returnnormalregister1')}}">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">register return normal credit</h3>
        </div>
       <!--  @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach -->
        <div class="box-body">
                  {{ csrf_field() }}
              <div class="form-group">
                  <label class="control-label col-sm-3" for="id">normal credit id:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control chosen" name="normal_id" id="normal_id" required="required">
                      <option selected disabled>~choose~</option>
                      @foreach($normalcredits as $credit)
                      <option >{{$credit->idnum}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
              <br>
              <br>
             <div class="form-group">
              <label class="col-md-3 control-label" for="total">amount</label>
              <div class="col-md-6">
                <input id="amount" name="amount" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="total">Interest</label>
              <div class="col-md-6">
                <input id="interest" name="interest" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="bank">bank deposited</label>
              <div class="col-md-6">
                <input id="bank" name="bank" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <!-- <div class="form-group">
              <label class="col-md-3 control-label" for="recipt">Recipt</label>
              <div class="col-md-6">
                <input id="recipt" name="recipt" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br> -->
              <div class="form-group">
                  <label class="control-label col-sm-3" for="month">month:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control chosen" name="month" id="month" required="required">
                      <option selected disabled>~choose~</option>
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
                <label class="col-md-3 control-label" for="date">entry date</label>
                <div class="col-md-6">
                  <input id="creditDate" name="creditDate" type="date" placeholder="" class="form-control" value=""></div>
                  <div class="fa fa-calendar"></div>
                </div>
                <br>
                <br>
               
                <div class="form-group">
                  <label class="control-label col-sm-3" for="status">status:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="status" id="status" required="required">
                      <option selected disabled>~choose~</option>
                      <option >0</option>
                      <option >1</option>
                      <option >2</option>
                </select>
                  </div>
              </div>
                <br>
                <br>


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