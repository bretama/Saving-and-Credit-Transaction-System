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
    					<li class="breadcrumb-item active">መዝገብ ድሌት ዕቋር ዝዓቖሩ</li>
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
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ወርሓዊ ዕቋር መዝግብ</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">መመዝገቢ ወርሓዊ ዕቋር</h4>
        </div>
         <div class="modal-body">
        <form action="/monthlyregister1" class="form-horizontal" role="form">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
       
       
                  <br>
                  <br>
                @include('forms.monthForm') 
                            
               
                <br>
                <br>
<!--                 <div class="form-group">
                  <label class="control-label col-md-3" for="leave">ዝወፀሉ ዕለት:<span class="text-danger">*</span></label>
                   <div class="col-md-6">
                  <input id="leave" name="leave" type="text" placeholder="" class="form-control" value=""></div>
                </div> -->
       <!--          <div class="form-group">
        <label for="">Simple Date &amp; Time</label>
          <div class='input-group date' id='example1'>
              <input type='text' class="form-control" />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
      </div> -->
                
 
      
        <tr>
        <div class="modal-footer">
          <button type="button" id="add" class="btn btn-default" data-dismiss="modal">መዝገብ</button>
        
       
          <button type="button" class="btn btn-default" data-dismiss="modal">ዕፀው</button>
        </div>
      </tr>
      </div>
      </form>
    </div>
    </div>
  </div>
  
</div>

<!--     bnbbbbbbbbbbbnbbbbbbbbbbbbbbbbbbbbbbbbb -->

<!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">መመዝገቢ ወርሓዊ ዕቋር</h4>
        </div>
        <form action="">
        <div class="modal-body">
       
                  <br>
                  <br>
               @include('forms.monthForm')
                <br>
                <br>
 
        
        <tr>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">ኣስተኻኽል</button>
        
       
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
    		<table class="table table-bordered table-striped" id="table11">
    			<tr>
    				<th>ኮድ</th>

    				<th>መጠን ዕቋር</th>
            <th>ናይ ስራሕ መካየዲ</th>
    				<th>ሼር ዝኣተዎ</th>
    				
    				<th>ወርሒ</th>
            <th>ዝኣተወሉ ዕለት</th>
    				<th>ወለድ</th>
    				<th>ቅፅዓት</th>
    				<th>ኣስተኻኽል</th>
    				<th>ኣጥፍእ</th>
    			</tr>
          @foreach($monthlysaving as $monthly)
    			<tr>
    				<td>{{$monthly->code}}</td>
    				<td>{{$monthly->saving}} </td>
    				<td>{{$monthly->sem1}} </td>
    				<td>{{$monthly->share }} </td>
    				<td>{{$monthly->month }}</td>
    				<td>{{$monthly->entryDate}}</td>
            <td>{{$monthly->interest}}</td>
    				<td>{{$monthly->penality}} </td>
            
    				
    				
    				
    				<td><a href="#" class="edit-modal btn btn-info"data-code="{{$monthlysaving->code}}" data-saving="{{$monthlysaving->saving}}" data-sem1="{{$monthlysaving->sem1}}" data-share="{{$monthlysaving->share}}" data-month="{{$monthlysaving->month}}" data-entrydate="{{$monthlysaving->entrydate}}" data-penality="{{$monthlysaving->penality}}" data-interest="{{$monthlysaving->interest}}" data-status="{{$monthlysaving->status}}" data-toggle="modal" data-target="#edit">ኣስተካክል</a> </td>
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

 <script type="text/javascript">
 $(document).on('click', '.create-modal', function(){
    $('#myModal').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('መዝገብ');
  });
 $("#add").click(function(){
  $.ajax({
    type : 'POST',
    url : 'monthlyregister1',
    data : {
      '_token': $('input[name=_token]').val(),
      'code' : $('input[name=code]').val(),
      'saving':$('input[name=saving]').val(),
      'sem1': $('input[name=sem1]').val(),
      'share':$('input[name=share]').val(),
      'month':$('input[name=month]').val(),
      'entrydate':$('input[name=entrydate]').val(),
      'penality':$('input[name=penality]'),
      'interest':$('input[name=interest]'),
    },
    success: function(data){
      if ((data.errors)) {
        $('.error').removeClass('hidden');
        $('.error').text('data.errors.code');
        $('.error').text('data.errors.saving');
        $('.error').text('data.errors.sem1');
        $('.error').text('data.errors.share');
        $('.error').text('data.errors.month');
        $('.error').text('data.errors.entrydate');
        $('.error').text('data.errors.penality');
        $('.error').text('data.errors.interest');
      }else {
        $('.error').remove();
      }
    }
  });
 });
 </script>

@endsection