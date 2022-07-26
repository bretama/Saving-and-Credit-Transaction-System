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
              <li class="breadcrumb-item"> <a href="{{url('/listofmembers')}}">list of members</a> </li>
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
      
        <form method="post" action="{{url('/abalatupdate')}}/{{$abalats->id}}">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">edit members</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">code</label>
              <div class="col-md-6"><input type="number" name="code" class="form-control" value="{{ $abalats->id }}"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
        <div class="form-group">
          <div class="row">
            <label for="name" class="col-md-3">name:</label>
            <div class="col-md-6"><input type="text" class="form-control" id="name" name="name" value="{{ $abalats->name }}"></div>
        </div>
      </div>
        <div class="form-group">
            <div class="row">
              <label class="col-md-3">fname</label>
              <div class="col-md-6"><input type="text" name="fname" class="form-control" value="{{ $abalats->fname }}"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">gfname</label>
              <div class="col-md-6"><input type="text" name="gfname" class="form-control" value="{{ $abalats->gfname }}"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">mother's name</label>
                        <div class="col-md-6"><input type="text" name="mname" class="form-control" value="{{ $abalats->mname }}"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                <div class="form-group">
                <div class="row">
                 <label class="control-label col-md-2 col5sm-2 col-xs-12">gender</label>
                  <div class="col-md-4 col-sm-7 col-xs-12">
                  <label  class="radio-inline">
                    <input type="radio" name="gender" id="male" value="M" checked="checked" required value="{{ $abalats->gender }}">
                    M
                  </label>
                  <label  class="radio-inline">
                    <input type="radio" name="gender" id="female" value="F" required value="{{ $abalats->gender }}">
                    F
                  </label>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Registration fee</label>
                        <div class="col-md-6"><input type="text" name="rbirr" class="form-control" value="{{ $abalats->rbirr }}"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Receipt</label>
                        <div class="col-md-6"><input type="text" name="receipt" class="form-control" value="{{ $abalats->receipt }}"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">bank</label>
                        <div class="col-md-6"><input type="text" name="bank" class="form-control" value="{{ $abalats->bank }}"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                                            <label class="col-md-3">werasi</label>
                        <div class="col-md-6"><input type="text" name="werasi" class="form-control" value="{{ $abalats->werasi }}"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

                <div class="form-group">
<div class="row">
                        <label class="col-md-3">Id number</label>
                        <div class="col-md-6"><input type="text" name="idnum" class="form-control" value="{{ $abalats->idnum }}"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Id given date</label>
                        <div class="col-md-6"><input type="date" name="idgiven" class="form-control" value="{{ $abalats->idgiven }}"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

          <div class="form-group">
            <div class="row">
              <label class="col-md-3">Date of birth</label>
              <div class="col-md-6"><input type="date" name="dob" class="form-control" value="{{ $abalats->dob }}"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
            <div class="form-group">
                  <label class="control-label col-sm-3" for="month">Type:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="type" required="required" value="{{ $abalats->type }}">
                      <option selected disabled>~Choose~</option>
                      
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
                    <!-- <div class="box-header with-border">
                        <h3 class="box-title">መረዳእታ ኣድራሻ</h3>
                    </div> -->
                    <div class="box-body">
                        
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">Woreda</label>
              <div class="col-md-6"><input type="text" name="wereda" class="form-control" value="{{ $abalats->wereda }}"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
      

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Sub-town</label>
                        <div class="col-md-6"><input type="text" name="town" class="form-control" value="{{ $abalats->town }}"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">Tabia</label>
                        <div class="col-md-6"><input type="text" name="qebelie" class="form-control" value="{{ $abalats->qebelie }}"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
        
     

       
            <div class="form-group">
            <div class="row">
              <label class="col-md-3">Phone</label>
              <div class="col-md-6"><input type="text" name="phone" class="form-control" value="{{ $abalats->phone}}"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">Occupation</label>
              <div class="col-md-6"><input type="text" name="occupation" class="form-control" value="{{ $abalats->occupation}}"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
          <div class="form-group">
                      <div class="row">
                  <label class=" col-sm-3" for="status">machure or child</label>
              <div class="col-md-6">
                    <select class="form-control" name="child" value="{{ $abalats->child}}" id="child" required="required">
                      <option selected disabled>~choose~</option>
                      <option >mature</option>
                      <option >child</option>
                      
                </select>
                  </div>
              </div>
            </div>
              
             
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">Education Level</label>
              <div class="col-md-6"><input type="text" name="edulevel" class="form-control" value="{{ $abalats->edulevel}}"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
         
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">number of F</label>
                        <div class="col-md-6"><input type="text" name="numfe" class="form-control" value="{{ $abalats->numfe }}"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">number of M</label>
                        <div class="col-md-6"><input type="text" name="nummale" class="form-control" value="{{ $abalats->nummale}}"> </div>
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
              <div class="col-md-6"><input type="date" name="entrydate" class="form-control" value="{{ $abalats->entrydate}}"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
           <div class="form-group">
            <div class="row">
              <label class="col-md-3">Leave Date</label>
              <div class="col-md-6"><input type="date" name="leavedate" class="form-control" value="{{ $abalats->leavedate}}"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
         <!--  <div class="form-group">
            <div class="row">
              <label class="col-md-3">ዝተሰናበተሉ ዕለት</label>
              <div class="col-md-6"><input type="date" name="leavedate" class="form-control" value="{{ $abalats->leavedate }}"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div> -->
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">idea</label>
              <div class="col-md-6"><input type="text" name="idea" class="form-control" value="{{ $abalats->idea }}"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
           <div class="input-group">
            <div class="row">
              <div class="custom-file">
                <input type="file" id="ckeditor" name="image" class="custom-file-input">
                <img src="{{asset('uploads/members/' . $abalats->image)}}" width="100px;" height="100px;" alt="Image">
                <input type="hidden" name="hidden_image" />
              <label class="custom-file-label">Coose file</label>
              
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
                                    <button type="submit" class="btn btn-block btn-success">update</button>
                                </div>
                            </div>
        </form>
        </div>
        </section>  
      </div>
  
</div>
    
 @endsection