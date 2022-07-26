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
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ህፃናት ዕቋር መዝግብ</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">መመዝገቢ ህፃናት ዕቋር</h4>
        </div>
        <div class="modal-body">
        <form action="{{url('childrenregister1')}}" id="validate_form" class="form-horizontal">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        
            @include('forms.children')
            
 
        
        <tr>
       
      </tr>
      
    </form>
      </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-primary">መዝገብ</button>
        
       
          <button type="button" class="btn btn-default" data-dismiss="modal">ዕፀው</button>
        </div>
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
          <h4 class="modal-title">መመዝገቢ ህፃናት ዕቋር</h4>
        </div>
        <form action="">
        <div class="modal-body">
            @include('forms.children')
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

                    <th>መጠን ዕቋር</th>
                    
                    <!-- <th>ቅፅዓት</th> -->
                    <th>ወርሒ</th>
                    <th>ወለድ</th>
                    <th>ዝኣተወሉ ዕለት</th>
                    <th>ጠቕላላ ድምር</th>
                    <th>ኣስተኻኽል</th>
                    <th class="col-xs-4">ኣጥፍእ</th>
                </tr>
                @foreach($children as $child)
                <tr>
                  
                   <td>{{$child->code}} </td>
                    <td>{{$child->amountDeposited}} </td>
                    <td>{{$child->month}} </td>
                    <td>{{$child->interest}} </td>
                    <td>{{$child->date}} </td>
                    <td>{{$child->withdrawalDate}} </td>
                    <!-- <td>{{$child->totalDepositedAmount}} </td> -->
                    
                    
                    
                    <td><a href="#" class="btn btn-info" data-toggle="modal" data-mycode="{{$child->code}}" data-myamount="{{$child->amountDeposited}}" data-mymonth="{{$child->month}}" data-myinterest="{{$child->interest}}" data-mydate="{{$child->date}}"  data-target="#edit">ኣስተካክል</a> </td>
                    <td><a href="#" class="btn btn-danger">ኣጥፍእ</a> </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
    </section>

@endsection
@section('script')
<script type="text/javascript" >
  $(document).on('click', '.create-modal', function(){
    $('#myModal').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('መዝገብ');
  });
   //$(document).ready(function(){
    //$('#validate_form').parsley();
  //});
  // $('#edit').on('show.bs.modal', function (event){
  //   var button = $(event.relatedTarget)
  //   var code = button.data('mycode')
  //   var amount = button.data('myamount')
  //   var month = button.data('mymonth')
  //   var interest = button.data('myinterest')
  //   var entrydate=button.data('mydate')
  //   var total =button.data('mytotal')

  //   var modal = $(this)
  //   modal.find('.modal-body #code').val(code);
  //   modal.find('.modal-body #amount').var(amount);
  //    modal.find('.modal-body #month').val(month);
  //   modal.find('.modal-body #interest').var(interest);
  //    modal.find('.modal-body #date').val(entrydate);
  //  // modal.find('.modal-body #').var(total);
  // })

</script>

@endsection -->