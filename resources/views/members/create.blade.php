

@extends('layouts.admin')
 
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">ናይ ኣባላት መመዝገቢ</h2>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{url('/')}}">ዳሽ ቦርድ</a> </li>
              <li class="breadcrumb-item active">መዝገብ ኣባላት</li>
            </ol>
          </div>
        </div>
      </div>

    </div>
    
  <div class="box">



    <div class="container">
   
                
        <div class="box box-primary">
    
    <form method="POST" action="/register1" id="validate_form">
        {{ csrf_field() }}
        <h2>ኣባላት መዝግብ</h2>
        <div class="row">
          <div class="col-xs-6">
          <div class="form-group">
            
              <label class="col-md-2">ኮድ</label>
              <div class="col-md-6"><input type="text" name="code" class="form-control" required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup"> </div>
              <div class="clearfix"></div>
            </div>
          </div>

        <div class="col-xs-6">
        <div class="form-group">
          <div class="row">
            <label for="name" class="col-md-2">ስም:</label>
            <div class="col-md-6"><input type="text" class="form-control" id="name" name="name" required=""></div>
        </div>
      </div>
    </div>
  </div>
      <div class="row">
        <div class="col-xs-6">
        <div class="form-group">
            
              <label class="col-md-2">ስም ኣቦ</label>
              <div class="col-md-6"><input type="text" name="fname" class="form-control" required=""> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="col-xs-6">
          <div class="form-group">
          
              <label class="col-md-2">ስም ኣባሓጎ</label>
              <div class="col-md-6"><input type="text" name="gfname" class="form-control" required=""> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
        </div>
      </div>
           <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    
                        <label class="col-md-2">ስም ኣዶ</label>
                        <div class="col-md-6"><input type="text" name="mname" class="form-control" required=""> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                <div class="col-xs-6">
                <div class="form-group">
             
                 <label class="control-label col-md-2 col5sm-2 col-xs-22">ፆታ</label>
                  <div class="col-md-4 col-sm-7 col-xs-22">
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
              </div>
              <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                    
                        <label class="col-md-2">መመዝገቢ ብር</label>
                        <div class="col-md-6"><input type="text" name="rbirr" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="col-xs-6">
                <div class="form-group">
                    
                        <label class="col-md-2">ደረሰኝ</label>
                        <div class="col-md-6"><input type="text" name="receipt" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
              </div>
                <div class="row">
                <div class="col-xs-6">
                <div class="form-group">
                    
                        <label class="col-md-2">ኣታዊ ዝተገብረሉ ባንኪ</label>
                        <div class="col-md-6"><input type="text" name="bank" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="col-xs-6">
                <div class="form-group">
                    
                                            <label class="col-md-2">ወራሲ</label>
                        <div class="col-md-6"><input type="text" name="werasi" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6">
                <div class="form-group">

                        <label class="col-md-2">መታወቅያ ቁፅሪ</label>
                        <div class="col-md-6"><input type="text" name="idnum" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="col-xs-6">
                <div class="form-group">
                    
                        <label class="col-md-2">መታወቅያ ዝተውሃበሉ ዕለት</label>
                        <div class="col-md-6"><input type="text" name="idgiven" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
              </div>
       <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            
              <label class="col-md-2">ዝተወለደሉ ዕለት</label>
              <div class="col-md-6"><input type="text" name="dob" class="form-control" required> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="col-xs-6">
         <div class="form-group">
            
              <label class="col-md-2">ወረዳ</label>
              <div class="col-md-6"><input type="text" name="wereda" class="form-control" required> </div>
              <div class="clearfix"></div>
            </div>

          </div>
        </div>
        <div class="row">
           <div class="col-xs-6">
                <div class="form-group">
                    
                        <label class="col-md-2">ክ/ከተማ</label>
                        <div class="col-md-6"><input type="text" name="town" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="col-xs-6">
                <div class="form-group">
                   
                        <label class="col-md-2">ጣብያ</label>
                        <div class="col-md-6"><input type="text" name="qebelie" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
              </div>
        
     
<div class="row">
          <div class="col-xs-6">
            <div class="form-group">
            
              <label class="col-md-2">ስልኪ</label>
              <div class="col-md-6"><input type="text" name="phone" class="form-control" required> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
          <div class="col-xs-6">
              <div class="form-group">
    
              <label class="col-md-2">ዝተዋፈረሉ ስራሕ</label>
              <div class="col-md-6"><input type="text" name="occupation" class="form-control" required> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
        </div>
        <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
            
              <label class="col-md-2">ደረጃ ት/ቲ</label>
              <div class="col-md-6"><input type="text" name="edulevel" class="form-control" required> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="col-xs-6">
          <div class="form-group">
        
              <label class="col-md-2">ሒሳብ ቁፅሪ</label>
              <div class="col-md-6"><input type="text" name="account" class="form-control" required> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
        </div>
         <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                   
                        <label class="col-md-2">በዝሒ-ስድራ ኣን</label>
                        <div class="col-md-6"><input type="text" name="numfe" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
              <div class="col-xs-6">
                <div class="form-group">
                   
                        <label class="col-md-2">በዝሒ-ስድራ ተባ</label>
                        <div class="col-md-6"><input type="text" name="nummale" class="form-control" required> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
              </div>

               <!--  <div class="form-group">
                    <div class="row">
                        <label class="col-md-2">ጠቕላላ በዝሒ-ስድራ</label>
                        <div class="col-md-6"><input type="text" name="total" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>
                     -->
               
                <div class="row">
                <div class="col-xs-6">
           <div class="form-group">
            
              <label class="col-md-2">ዝኣተወሉ ዕለት</label>
              <div class="col-md-6"><input type="text" name="entrydate" class="form-control" required> </div>
              <div class="clearfix"></div>
            </div>

          </div>
          <div class="col-xs-6">
          <div class="form-group">
            
              <label class="col-md-2">ዝተሰናበተሉ ዕለት</label>
              <div class="col-md-6"><input type="text" name="leavedate" class="form-control" required> </div>
              <div class="clearfix"></div>
            </div>
            
          </div>
        </div>
                    <div class="form-group">
            <div class="row">
              <label class="col-md-2">መብርሂ</label>
              <div class="col-md-6"><input type="textarea" name="idea" class="form-control" required> </div>
              <div class="clearfix"></div>
            </div>

          </div>

 
        <!-- <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div> -->
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">መዝግብ</button>
        </div>
        
    </form>
  </div>

</div>
</div>
</div>
    

@endsection
@section('script')
<script>
  $(document).ready(function(){
    $('#validate_form').parsley();
  });
</script>

@endsection