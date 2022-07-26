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
  <a href="#" class="create-modal">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ነፃ-ወለድ ዕቋር መዝግብ</button>
</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">መመዝገቢ ነፃ-ወለድ ዕቋር</h4>
        </div>
        <form action="">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <div class="modal-body">
@include('forms.freeInterest')              
 
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
          <h4 class="modal-title">መስተኻኸሊ ነፃ-ወለድ ዕቋር</h4>
        </div>
        <form action="">
        <div class="modal-body">
           @include('forms.freeInterest')
                <br>
                <br>
 
        
        <tr>
        <div class="modal-footer">
          <button type="button" id="edit" class="btn btn-primary">ኣስተኻኽል</button>
        
       
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

                    <th>መጠን ዕቋር</th>
                    <th>ሼር ዝኣተዎ</th> 
                    <th>ቅፅዓት</th>
                    <th>ወርሒ</th>
                    <th>ዝኣተወሉ ዕለት</th> 
                    <th>ጠቕላላ ድምር</th>
                    <th>ክልቅሖ ዝኽእል</th>
                    <th>ኣስተኻኽል</th>
                    <th class="col-xs-4">ኣጥፍእ</th>
                </tr>
                @foreach($abalats as $abal)
                <tr>
                    <!-- <td></td> -->
                    <td>{{$abal->code}}</td>
                    <td>{{$abal->saving}}</td>
                    <td>{{$abal->share}}</td>
                    <td>{{$abal->penality}}</td>
                    <td>{{$abal->month}}</td>
                    <td>{{$abal->entryDate}}</td>
                    <td>{{$abal->totalDepositedAmount}}</td>
                    <td>{{$abal->totalPossibleLoan}}</td>
                    
                    
                    
                    
                    <td><a href="#" class="edit-modal btn btn-info" data-code="{{$abal->code}}" data-saving="{{$abal->saving}}" data-share="{{$abal->share}}" data-penality="{{$abal->penality}}" data-month="{{$abal->month}}" data-entrydate="{{$abal->entryDate}}" data-totaldeposite="{{$abal->totalDepositedAmount}}" data-totalloan="{{$abal->totalPossibleLoan}}" data-toggle="modal" data-target="#edit"><i class="glyphicon glyphicon-pencil"></i> ኣስተካክል</a> </td>
                    <td><a href="#" class="btn btn-danger">ኣጥፍእ</a> </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
    </section>

@endsection

<!-- @section('script') -->
<script type="text/javascript" >

  //$(document).ready(function(){
    //$('#validate_form').parsley();
  //});
  // $(document).on('click','.create-modal', function(){
  //   $('#myModal').modal('show');
   // $('.form-horizontal').show();
//     $('.modal-title').text('ነፃ-ወለድ ዕቋር መዝግብ');
//   });
// $("#add").click(function(){
//   $.ajax({
//     type :'POST',
//     url : 'freeinterestregister',
//     data : {
//       '_token' : $('input[name=_token]').val(),
//       'code' : $('input[name=code]').val(),
//       'amount': $('input[name=amount]').val(),
//       'sem1' : $('input[name=sem1]').val(),
//       'month' : $('input[name=month]').val(),
//       'penality': $('input[name=penality]').val(),
//       'date': $('input[name=date]').val(),
//     },
//     success: function(data){
//       if ((data.errors)) {
//         $('.error').removeClass('hidden');
//         $('.error').text(data.errors.code);
//         $('.error').text(data.errors.amount);
//         $('.error').text(data.errors.sem1);
//         $('.error').text(data.errors.month);
//         $('.error').text(data.errors.penality);
//         $('.error').text(data.errors.date);

//       }else {
//         $('.error').remove();
//         $('#table').append("<tr class='free"+ data.code + "')"+
//           "<td>" + data.code + "</td>" +
//           "<td>" + data.amount + "</td>" +
//           "<td>" + data.sem1 + "</td>" +
//           "<td>" + data.month + "</td>" +
//           "<td>" + data.penality + "</td>" +
//           "<td>" + data.date + "</td>" +
//       }
//     }
//   })
// })

// <!-- -->

// @endsection