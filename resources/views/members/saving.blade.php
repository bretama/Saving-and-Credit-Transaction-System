@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">መእተዊ ዕቋር</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/savingdisplay')}}">ዕቋር ረአ</a> </li>
    					<li class="breadcrumb-item active">መእተዊ ዕቋር</li>
    				</ol>
    			</div>
    		</div>
    	</div>

    </div>


 <section class="content">
    <div class="col-md-8 col-md-offset-1">
    <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">ኣባላት መዝግብ</h1>
                    </div>
        <div class="container-fluid">
            <form method="post" action="">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2">ኮድ</label>
                        <div class="col-md-6"><input type="text" name="code" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="form-group">
                  <label class="control-label col-md-2" for="occupation">ዓይነት ዕቋር:<span class="text-danger">*</span></label>
                  <div class="col-md-6">
                    <select class="form-control" name="occupation" required="required">
                      <option selected disabled>~ምረፅ~</option>
                      <option >ወርሓዊ</option>
                      <option >ኢንቨስትመንት</option>
                      <option >ድሌት</option>
                      <option >ግዜ ገደብ</option>
                      <option >ወለድ ነፃ ዕቋር</option>
                      <option >ህፃናት ዕቋር</option>
                      
                    </select>
                  </div>
              </div>
              <br><br><br>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2">ዕቋር</label>
                        <div class="col-md-6"><input type="text" name="mname" class="form-control"> </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                
                <div class="form-group">
                    <input type="submit" value="register" class="btn btn-info">
                    
                </div>

            </form>
                
        </div>
    </div>
</div>
</section>


    @endsection
