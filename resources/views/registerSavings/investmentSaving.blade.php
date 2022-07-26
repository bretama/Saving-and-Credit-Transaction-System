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
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">register investment saving</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">investment saving</h4>
        </div>
        <form action="{{ URL::to('investmentregister1')}}" method="POST" id="modal1">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="modal-body">
                       @include('forms.investment')
                                
 
        
        <tr>
        <div class="modal-footer">
         <input type="submit" name="" class="btn btn-success pull-left" value="Save">
        
       
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </tr>
      </div>
    </form>
      
    </div>
  </div>
  
</div>
 <!-- Modal -->
  <div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">መመዝገቢ ግዜ-ገደብ ዕቋር</h4>
        </div>
        <form action="">
        <div class="modal-body">
                       @include('forms.investment')

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
  
</div>
            <!-- <p>
                <a href="{{url('/register')}} " class="btn btn-primary"> ኣባላት መዝግብ</a>
            </p> -->
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ኮድ</th>
                    <th>ዕቋር</th>
                    <th>ሼር</th>
                    <!-- <th>ቅፅዓት</th> -->
                    <th>ወርሒ</th>
                    <th>ወለድ</th>
                    <th>ድምር</th>
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
@section('script')
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $('#modal1').on('submit',function(e){
    alert('jhjdbvj')
    
  })
</script>