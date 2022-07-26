@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">ናይ ኣባላት ዝርዝር</h1> -->

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <a href="{{url('/')}}">ዳሽ ቦርድ</a> </li>
                        <li class="breadcrumb-item active">መዝገብ ግዜ-ገደብ ዕቋር ዝዓቖሩ</li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
  
<section class="content">
        <div class="container-fluid">
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ግዜ-ገደብ ዕቋር መዝግብ</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">መመዝገቢ ግዜ-ገደብ ዕቋር</h4>
        </div>
        <form action="">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="modal-body">
          <!-- @include('forms.timelimitForm')                < -->
                          <div class="form-group">
                  <label class="control-label col-sm-3" for="month">code:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="month" required="required">
                      <option selected disabled>~ምረፅ~</option>
                      @foreach($abalats as $abalat)
                      <option >{{$abalat->code}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
                  <br>
                  <br>
               <div class="form-group">
              <label class="col-md-3 control-label" for="birthPlace">መጠን ዝኣቱ ብር</label>
              <div class="col-md-6">
                <input id="birthPlace" name="birthPlace" type="text" placeholder="" class="form-control" value=""></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="birthPlace">ናይ ስራሕ መካየዲ</label>
              <div class="col-md-6">
                <input id="birthPlace" name="birthPlace" type="text" placeholder="" class="form-control" value=""></div>
              </div>
              <br>
              <br>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="occupation">ወርሒ:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="occupation" required="required">
                      <option selected disabled>~ምረፅ~</option>
                      <option >መስከረም</option>
                      <option >ጥቅምቲ</option>
                      <option >ሕዳር</option>
                      <option >ታሕሳስ</option>
                      <option >ጥሪ</option>
                      <option >ለካቲት</option>
                      <option >መጋቢት</option>
                      <option >ሚያዝያ</option>
                      <option >ግንቦት</option>
                      <option >ሰነ</option>
                      <option >ሓምለ</option>
                      <option >ነሓሰ</option>
                </select>
                  </div>
              </div>
                  <br>
                  <br>
               <div class="form-group">
                <label class="col-md-3 control-label" for="dob">ዝኣተወሉ ዕለት</label>
                <div class="col-md-6">
                  <input id="dob" name="dob" type="date" placeholder="" class="form-control" value=""></div>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label class="col-md-3 control-label" for="dob">ቅፅዓት</label>
                <div class="col-md-6">
                  <input id="dob" name="dob" type="text" placeholder="" class="form-control" value=""></div>
                </div>
                <br>
                <br>
                <div class="form-group">
                  <label class="control-label col-md-3" for="occupation">ዝወፀሉ ዕለት:<span class="text-danger">*</span></label>
                   <div class="col-md-6">
                  <input id="job" name="dob" type="date" placeholder="" class="form-control" value=""></div>
                </div>

                <br>
                <br>
 
        
        <tr>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">መዝገብ</button>
        
       
          <button type="button" class="btn btn-default" data-dismiss="modal">ዕፀው</button>
        </div>
      </tr>
      </div>
    </form>
      
    </div>
  </div>
  
</div>
 <!-- Modal -->
  <!-- <div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog"> -->
    
      <!-- Modal content-->
      <!-- <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">መመዝገቢ ግዜ-ገደብ ዕቋር</h4>
        </div>
        <form action="">
        <div class="modal-body">
          @include('forms.timelimitForm')                <

                <br>
                <br>
 
        
        <tr>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">መዝገብ</button>
        
       
          <button type="button" class="btn btn-default" data-dismiss="modal">ዕፀው</button>
        </div>
      </tr>
      </div>
    </form>
      
    </div>
  </div>
  
</div> -->
            <!-- <p>
                <a href="{{url('/register')}} " class="btn btn-primary"> ኣባላት መዝግብ</a>
            </p> -->
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ኮድ</th>

                    <th>መጠን ዕቋር</th>
                    <!-- <th>ሼር ዝኣተዎ</th> -->
                    <th>ቅፅዓት</th>
                    <th>ወርሒ</th>
                    <th>ወለድ</th>
                    <th>ጠቕላላ ድምር</th>
                    <th>ኣስተኻኽል</th>
                    <th class="col-xs-4">ኣጥፍእ</th>
                </tr>
                <tr>
                    <!-- <td></td> -->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    
                    
                    <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#edit">ኣስተካክል</a> </td>
                    <td><a href="#" class="btn btn-danger">ኣጥፍእ</a> </td>
                </tr>
            </table>
        </div>
    </div>
</div>
    </section>

@endsection