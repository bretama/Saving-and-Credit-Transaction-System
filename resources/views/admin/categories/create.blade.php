@extends('layouts.admin')
@section('content')

<section class="content-header">
      <h1>
        Add Categories
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Categories</li>
      </ol>
    </section>
    <section class="content">
    	<div class="container-fluid">
    		<form method="post" action="{{ url('store')}}">
                <input type="hidden" name="_token" value="$category->title">
                {{ csrf_field() }}
               <div class="form-group">
                   <div class="row">
                       <label class="col-md-3">Title</label>
                       <div class="col-md-6"><input type="text" name="title" class="form-control"></div>
                       <div class="clearfix"></div>

                   </div>
               </div>  
               <div class="form-group">
                   <input type="submit" class="btn btn-info" value="save">
               </div>    
            </form>
    	</div>
    </section>

@endsection