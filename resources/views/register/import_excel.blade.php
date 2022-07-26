@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">import</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/')}}">dash board</a> </li>
    					<li class="breadcrumb-item active">Import Excel members </li>
    				</ol>
    			</div>
    		</div>
    	</div>
    </div>
 <section class="content">
    <div class="container">
        <div class="row">
    	<div class="container-fluid">
    <div class="box box-primary">
        <h3 align="center">Import</h3>
        <br>
        @if(count($errors) > 0)
         <div class="alert alert-danger">
             Upload Validation Error<br><br>
             <ul>
                 @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
             </ul>
         </div>
         @endif
       @if($message = Session::get('success'))
         <div class="alert alert-success alert-block">
             <button type="button" class="close" data-dismiss="alert">X</button>
             <strong>{{$message}}</strong>
         </div>
        @endif




        <form method="post" enctype="multipart/form-data" action="{{url('/import_excel/import')}}">
            {{ csrf_field()}}
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td width="40%" align="right"><label>Select File for Upload</label> </td>
                        <td width="30">
                            <input type="file" name="select_file" />
                        </td>
                        <td width="30%" align="left">
                            <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                        <td width="30%" align="left"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
</div>
</div>

</script>
</section>

 @endsection

 <!-- @section('scrip') -->