@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ናይ ኣባላት ዝርዝር</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <a href="{{url('/listofmembers')}}">መዝገብ ህፃናት ረአ</a> </li>
                        <li class="breadcrumb-item active">መዝገብ ህፃናት ረአ</li>
                    </ol>
                </div>
            </div>
        </div>

    </div>

    
<div class="box">
<div id="myTabContent" class="main_container" >

<section class="content">
    <div class="container">
        
            <form method="post" action="/register">
                <div class="col-md-5">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">ህፃናት መዝግብ</h3>
        </div>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="box-body">
                  {{ csrf_field() }}
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">ኮድ</label>
              <div class="col-md-6"><input type="text" name="code" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
        <div class="form-group">
          <div class="row">
            <label for="name" class="col-md-3">ስም:</label>
            <div class="col-md-6"><input type="text" class="form-control" id="name" name="name"></div>
        </div>
      </div>
        <div class="form-group">
            <div class="row">
              <label class="col-md-3">ስም ኣቦ</label>
              <div class="col-md-6"><input type="text" name="fname" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">ስም ኣባሓጎ</label>
              <div class="col-md-6"><input type="text" name="gfname" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">ስም ኣዶ</label>
                        <div class="col-md-6"><input type="text" name="mname" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                <div class="form-group">
                <div class="row">
                 <label class="control-label col-md-2 col5sm-2 col-xs-12">ፆታ</label>
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
                        <label class="col-md-3">ደረሰኝ</label>
                        <div class="col-md-6"><input type="text" name="receipt" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">ኣታዊ ዝተገብረሉ ባንኪ</label>
                        <div class="col-md-6"><input type="text" name="bank" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                                            <label class="col-md-3">ወራሲ</label>
                        <div class="col-md-6"><input type="text" name="werasi" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>

          <div class="form-group">
            <div class="row">
              <label class="col-md-3">ዝተወለደሉ ዕለት</label>
              <div class="col-md-6"><input type="date" name="dob" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
            <div class="form-group">
                  <label class="control-label col-sm-3" for="month">ዓይነት ኣባልነት:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="type" required="required">
                      <option selected disabled>~ምረፅ~</option>
                      
                      <option >መስራቲ</option>
                      <option >ተራ ኣባል</option>
                      
                </select>
                  </div>
              </div>
                
  </div>
</div>
</div>
        <div class="col-md-5 col-md-offset-1">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">መረዳእታ ኣድራሻ</h3>
                    </div>
                    <div class="box-body">
                        
                          <div class="form-group">
            <div class="row">
              <label class="col-md-3">ወረዳ</label>
              <div class="col-md-6"><input type="text" name="wereda" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
      

                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">ክ/ከተማ</label>
                        <div class="col-md-6"><input type="text" name="town" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3">ጣብያ</label>
                        <div class="col-md-6"><input type="text" name="qebelie" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
        
     

       
            <div class="form-group">
            <div class="row">
              <label class="col-md-3">ስልኪ</label>
              <div class="col-md-6"><input type="text" name="phone" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">ዝተዋፈረሉ ስራሕ</label>
              <div class="col-md-6"><input type="text" name="occupation" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">ደረጃ ት/ቲ</label>
              <div class="col-md-6"><input type="text" name="edulevel" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">ሒሳብ ቁፅሪ</label>
              <div class="col-md-6"><input type="text" name="account" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>

           <div class="form-group">
            <div class="row">
              <label class="col-md-3">ዝኣተወሉ ዕለት</label>
              <div class="col-md-6"><input type="date" name="entrydate" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-3">ዝተሰናበተሉ ዕለት</label>
              <div class="col-md-6"><input type="date" name="leavedate" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
                    <div class="form-group">
            <div class="row">
              <label class="col-md-3">መብርሂ</label>
              <div class="col-md-6"><input type="textarea" id="ckeditor" name="idea" class="form-control"> </div>
              <div class="clearfix"></div>
            </div>

          </div>

</div>


            </div>

        </div>

<div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-block btn-success">ኣቐምጥ</button>
                                </div>
                            </div>
            </form>
        </div>
            </section>  
        </div>
  
</div>
    
 @endsection