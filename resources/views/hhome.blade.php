   
@extends('layouts.admin')
 @section('content')
     <div class="container">
      <div class="right">
        <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>        
      </div>
       <div class="table-responsive">
         <table class="table table-bordered table-striped" id="user_table">
           <thead>
             <tr>
               <th width="10%">Image</th>
               <th width="35%">first name</th>
                <th width="35%">last name</th>
               <th width="30%">action</th>
             </tr>
           </thead>
         </table>
       </div>


        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">add new record</h4>
        </div>
        <div class="modal-body">
          <span id="form_result"></span>
          <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="control-label col-md-4">first name</label>
              <div class="col-md-8">
                <input type="text" name="first_name" id="first_name" class="form-control">
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-4">last name</label>
              <div class="col-md-8">
                <input type="text" name="last_name" id="last_name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">image</label>
              <div class="col-md-8">
                <input type="file" name="image" id="image" class="form-control">
              </div>
            </div>

            <div class="form-group" align="center">
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
            </div>
          </form>

        
      </div>
      
    </div>
  </div>
  
     </div>
     <p>vfbcdnoxkmwsxwbccddddddddddddddddd<br>ddddddddddddddddddddddddddddddddddddddddd<br>ddddddddddddddddddddddddddddddddddddddddddddddddddddd<br>ddddddddddddddddddddddddddddddddddddd</p>
        </div>
        @endsection

        @section('script')
        
  </script>
        @endsection