@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">teacoffee</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{url('/waterdisplay')}}">teacoffee</a> </li>
              <li class="breadcrumb-item active">teacoffee</li>
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
        <form method="post" action="/waterregister1">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">teacoffee register</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
             
            
             <div class="form-group">
              <label class="col-md-3 control-label" for="">Name</label>
              <div class="col-md-6">
                <input id="name" name="name" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="sem">Futher name</label>
              <div class="col-md-6">
                <input id="fname" name="fname" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="sem">Grand father name</label>
              <div class="col-md-6">
                <input id="gfname" name="gfname" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              
               <div class="form-group">
              <label class="col-md-3 control-label" for="">Total numbers</label>
              <div class="col-md-6">
                <input id="number" name="number" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="">Per one</label>
              <div class="col-md-6">
                <input id="perone" name="perone" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
                       
               <div class="form-group">
              <label class="col-md-3 control-label" for="sem">water register date</label>
              <div class="col-md-6">
                <input id="entrydate" name="entrydate" type="date" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
             <div class="form-group">
                  <label class="control-label col-sm-3" for="occupation">Month:<span class="text-danger">*</span></label>
                  <div class="col-md-6">
                    <select class="form-control" name="month" id="month" required="required">
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