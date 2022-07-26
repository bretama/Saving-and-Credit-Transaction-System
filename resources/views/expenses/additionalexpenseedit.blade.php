@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">additionalexpenses</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{url('/additionalexpensedisplay')}}">additionalexpenses</a> </li>
              <li class="breadcrumb-item active">additionalexpenses</li>
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
        <form method="post" action="/additionalexpenseupdate/{{$additionalexpenses->id}}">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">additionalexpenses edit</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
             
            
             <div class="form-group">
              <label class="col-md-3 control-label" for="">Name</label>
              <div class="col-md-6">
                <input id="name" name="name" type="text" value="{{$additionalexpenses->name}}" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="sem">Futher name</label>
              <div class="col-md-6">
                <input id="fname" name="fname" value="{{$additionalexpenses->fname}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="sem">Grand father name</label>
              <div class="col-md-6">
                <input id="gfname" name="gfname" value="{{$additionalexpenses->gfname}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="">Number of days</label>
              <div class="col-md-6">
                <input id="numdays" name="numdays" value="{{$additionalexpenses->numdays}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="">Amount</label>
              <div class="col-md-6">
                <input id="amount" name="amount" value="{{$additionalexpenses->amount}}"  type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="occupation">Type:<span class="text-danger">*</span></label>
                  <div class="col-md-6">
                    <select class="form-control" name="type" value="{{$additionalexpenses->type}}"  id="type" required="required">
                    <option selected disabled>~choose~</option>
                     <option >electricPower</option>
                      <option >houseAllowance</option>
                      <option >telecom</option>
                      
                </select>
                  </div>
              </div>
                  <br>
                  <br>
                   <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="sem">Payment date</label>
              <div class="col-md-6">
                <input id="entrydate" name="entrydate" value="{{$additionalexpenses->entrydate}}" type="date" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
             <div class="form-group">
                  <label class="control-label col-sm-3" for="occupation">Month:<span class="text-danger">*</span></label>
                  <div class="col-md-6">
                    <select class="form-control" name="month" value="{{$additionalexpenses->month}}" id="month" required="required">
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
              <label class="col-md-3 control-label" for="sem">Receipt</label>
              <div class="col-md-6">
                <input id="receipt" name="receipt" value="{{$additionalexpenses->receipt}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
       

</div>


            </div>

        </div>

<div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-block btn-success">Update</button>
                                </div>
                            </div>
        </form>
        </div>
        </section>  
      </div>
  
</div>
    
 @endsection