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
              <li class="breadcrumb-item"> <a href="{{url('/listofmembers')}}">see the list of members</a> </li>
              <li class="breadcrumb-item active">members list</li>
            </ol>
          </div>
        </div>
      </div>

    </div>

    
<div class="box">
<div id="myTabContent" class="main_container" >

<section class="content">
    <div class="container">
      
        <form method="post" action="{{ route('abalat.update', $abalats->id) }}">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">regster members</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">code</label>
              <div class="col-md-6"><input type="text" name="code" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
        <div class="form-group">
          <div class="row">
            <label for="name" class="col-md-3">name:</label>
            <div class="col-md-6"><input type="text" class="form-control" id="name" name="name"></div>
        </div>
      </div>
        <div class="form-group">
            <div class="row">
              <label class="col-md-3">father name</label>
              <div class="col-md-6"><input type="text" name="fname" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">grand father name</label>
              <div class="col-md-6"><input type="text" name="gfname" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">mother name</label>
                        <div class="col-md-6"><input type="text" name="mname" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                <div class="form-group">
                <div class="row">
                 <label class="control-label col-md-2 col5sm-2 col-xs-12">sex</label>
                  <div class="col-md-4 col-sm-7 col-xs-12">
                  <label  class="radio-inline">
                    <input type="radio" name="gender" id="male" value="ተባ" checked="checked" required>
                    ተባ
                  </label>
                  <label  class="radio-inline">
                    <input type="radio" name="gender" id="female" value="ኣን" required>
                    ኣን
                  </label>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">paiment for regstration</label>
                        <div class="col-md-6"><input type="text" name="rbirr" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">receipt</label>
                        <div class="col-md-6"><input type="text" name="receipt" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">deposited bank</label>
                        <div class="col-md-6"><input type="text" name="bank" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                                            <label class="col-md-3">werasi</label>
                        <div class="col-md-6"><input type="text" name="werasi" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

                <div class="form-group">
<div class="row">
                        <label class="col-md-3">ID noumber</label>
                        <div class="col-md-6"><input type="text" name="idnum" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">date of id given</label>
                        <div class="col-md-6"><input type="date" name="idgiven" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

          <div class="form-group">
            <div class="row">
              <label class="col-md-3">date of birth</label>
              <div class="col-md-6"><input type="date" name="dob" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
            <div class="form-group">
                  <label class="control-label col-sm-3" for="month">type of membershp:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="type" required="required">
                      <option selected disabled>~choose~</option>
                      
                      <option >founder</option>
                      <option >member</option>
                      
                </select>
                  </div>
              </div>
          
  </div>
</div>
</div>
        <div class="col-md-5 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">address</h3>
                    </div>
                    <div class="box-body">
                        
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">werada</label>
              <div class="col-md-6"><input type="text" name="wereda" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
      

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">sub city</label>
                        <div class="col-md-6"><input type="text" name="town" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">kebelie</label>
                        <div class="col-md-6"><input type="text" name="qebelie" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
        
     

       
            <div class="form-group">
            <div class="row">
              <label class="col-md-3">phone</label>
              <div class="col-md-6"><input type="text" name="phone" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">occupation</label>
              <div class="col-md-6"><input type="text" name="occupation" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">level of education</label>
              <div class="col-md-6"><input type="text" name="edulevel" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">account number</label>
              <div class="col-md-6"><input type="text" name="account" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">number of females in your familly</label>
                        <div class="col-md-6"><input type="text" name="numfe" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">number of males in your familly</label>
                        <div class="col-md-6"><input type="text" name="nummale" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

<!--                 <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">ጠቕላላ በዝሒ-ስድራ</label>
                        <div class="col-md-6"><input type="text" name="total" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div> -->
           <div class="form-group">
            <div class="row">
              <label class="col-md-3">entrance date</label>
              <div class="col-md-6"><input type="date" name="entrydate" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">leavery date</label>
              <div class="col-md-6"><input type="date" name="leavedate" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">description</label>
              <div class="col-md-6"><input type="text" name="idea" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>

</div>


            </div>

        </div>

<div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-block btn-success">put</button>
                                </div>
                            </div>
        </form>
        </div>
        </section>  
      </div>
  
</div>
    
 @endsection