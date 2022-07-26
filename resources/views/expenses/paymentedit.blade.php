@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Payments</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{url('/paymentdisplay')}}">Payments</a> </li>
              <li class="breadcrumb-item active">Payments</li>
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
        <form method="post" action="/paymentupdate/{{$payments->id}}">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Payments edit</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
             
            
             <div class="form-group">
              <label class="col-md-3 control-label" for="">Name</label>
              <div class="col-md-6">
                <input id="name" name="name" type="text" value="{{$payments->name}}" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="sem">Futher name</label>
              <div class="col-md-6">
                <input id="fname" name="fname" value="{{$payments->fname}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="sem">Grand father name</label>
              <div class="col-md-6">
                <input id="gfname" name="gfname" value="{{$payments->gfname}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
                <div class="form-group">
              <label class="col-md-3 control-label" for="">Days</label>
              <div class="col-md-6">
                <input id="days" name="days" type="text" value="{{$payments->days}}" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="">Basic salary</label>
              <div class="col-md-6">
                <input id="basicSalary" name="basicSalary"vvalue="{{$payments->basicSalary}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="">Transport Allowance</label>
              <div class="col-md-6">
                <input id="transportAllowance" name="transportAllowance" value="{{$payments->transportAllowance}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
                            <div class="form-group">
              <label class="col-md-3 control-label" for="">House Allowance</label>
              <div class="col-md-6">
                <input id="houseAllowance" name="houseAllowance" value="{{$payments->houseAllowance}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="">Gross Earning</label>
              <div class="col-md-6">
                <input id="grossEarning" name="grossEarning" value="{{$payments->grossEarning}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="">Income Tax</label>
              <div class="col-md-6">
                <input id="incomeTax" name="incomeTax" value="{{$payments->incomeTax}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="">Pension1</label>
              <div class="col-md-6">
                <input id="pension1" name="pension1" value="{{$payments->pension1}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
            <div class="form-group">
              <label class="col-md-3 control-label" for="">Pension2</label>
              <div class="col-md-6">
                <input id="pension2" name="pension2" value="{{$payments->pension2}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="">Total Diduction</label>
              <div class="col-md-6">
                <input id="totalDiduction" name="totalDiduction" value="{{$payments->totalDiduction}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="">Net Pay</label>
              <div class="col-md-6">
                <input id="netPay" name="netPay" value="{{$payments->netPay}}" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="sem">Payment date</label>
              <div class="col-md-6">
                <input id="entrydate" name="entrydate" value="{{$payments->entrydate}}" type="date" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
             <div class="form-group">
                  <label class="control-label col-sm-3" for="occupation">Month:<span class="text-danger">*</span></label>
                  <div class="col-md-6">
                    <select class="form-control" name="month" value="{{$payments->month}}" id="month" required="required">
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