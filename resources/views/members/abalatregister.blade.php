@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">List of Members</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/listofmembers')}}">List of Members</a> </li>
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
    	<div class="jumbotron">
    		<form method="post" action="{{url('/register1')}}" enctype="multipart/form-data">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Register Members</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">Code</label>
              <div class="col-md-6"><input type="number" name="code" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
        <div class="form-group">
          <div class="row">
            <label for="name" class="col-md-3">Name:</label>
            <div class="col-md-6"><input type="text" class="form-control" id="name" name="name"></div>
        </div>
      </div>
        <div class="form-group">
            <div class="row">
              <label class="col-md-3">Fname</label>
              <div class="col-md-6"><input type="text" name="fname" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">Gfname</label>
              <div class="col-md-6"><input type="text" name="gfname" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Mother Name</label>
                        <div class="col-md-6"><input type="text" name="mname" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                <div class="form-group">
                <div class="row">
                 <label class="control-label col-md-2 col5sm-2 col-xs-12">Gender</label>
                  <div class="col-md-4 col-sm-7 col-xs-12">
                  <label  class="radio-inline">
                    <input type="radio" name="gender" id="male" value="M" checked="checked" required>
                    M
                  </label>
                  <label  class="radio-inline">
                    <input type="radio" name="gender" id="female" value="F" required>
                    F
                  </label>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Registration Fee</label>
                        <div class="col-md-6"><input type="text" name="rbirr" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="bank">Bank Deposited</label>
              <div class="col-md-6">
                    <select class="form-control" name="bank" id="bank" required="required">
                      <option selected disabled>~Choose~</option>
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
                    <div class="row">
                        <label class="col-md-3">Receipt</label>
                        <div class="col-md-6"><input type="text" name="receipt" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>


                <div class="form-group">
                    <div class="row">
                                            <label class="col-md-3">Werasi</label>
                        <div class="col-md-6"><input type="text" name="werasi" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

                <div class="form-group">
<div class="row">
                        <label class="col-md-3">Id Number</label>
                        <div class="col-md-6"><input type="text" name="idnum" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Id Given Date</label>
                        <div class="col-md-6"><input type="date" name="idgiven" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

          <div class="form-group">
            <div class="row">
              <label class="col-md-3">DOB</label>
              <div class="col-md-6"><input type="date" name="dob" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
            <div class="form-group">
                  <label class="control-label col-sm-3" for="month">type:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="type" required="required">
                      <option selected disabled>~Choose~</option>
                      
                      <option >Founder</option>
                      <option >Member</option>
                      
                </select>
                  </div>
              </div>
    			
  </div>
</div>
</div>
        <div class="col-md-5 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                    </div>
                    <div class="box-body">
                        
    			          <div class="form-group">
            <div class="row">
              <label class="col-md-3">Woreda</label>
              <div class="col-md-6"><input type="text" name="wereda" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
      

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Sub-Town</label>
                        <div class="col-md-6"><input type="text" name="town" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Kebelie</label>
                        <div class="col-md-6"><input type="text" name="qebelie" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
        
     

       
            <div class="form-group">
            <div class="row">
              <label class="col-md-3">Phone Number</label>
              <div class="col-md-6"><input type="text" name="phone" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">Occupation</label>
              <div class="col-md-6"><input type="text" name="occupation" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
          <br>
                     <div class="form-group">
                      <div class="row">
                  <label class=" col-sm-3" for="status">Maturity</label>
              <div class="col-md-6">
                    <select class="form-control" name="child" id="child" required="required">
                      <option selected disabled>~Choose~</option>
                      <option >Mature</option>
                      <option >Child</option>
                      
                </select>
                  </div>
              </div>
            </div>
              
           
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">Education Level</label>
              <div class="col-md-6"><input type="text" name="edulevel" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
         
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Number of F</label>
                        <div class="col-md-6"><input type="text" name="numfe" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Number of M</label>
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
              <label class="col-md-3">Entry Date</label>
              <div class="col-md-6"><input type="date" name="entrydate" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
           <!-- <div class="form-group">
            <div class="row">
              <label class="col-md-3">Leave Date</label>
              <div class="col-md-6"><input type="date" name="leavedate" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div> -->
         
               <!--      <div class="form-group">
            <div class="row">
              <label class="col-md-3">reason</label>
              <div class="col-md-6"><input type="textarea" id="ckeditor" name="idea" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <br>
          <br> -->
          <div class="input-group">
            <div class="row">
              <div class="custom-file">
                <input type="file" id="ckeditor" name="image" class="custom-file-input">
              <label class="custom-file-label">Choose File</label>
              
              <div class="clearfix"></div>
            </div>
            </div>
          </div>

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
        </div>
    		</section>	
    	</div>
  
</div>
    
 @endsection