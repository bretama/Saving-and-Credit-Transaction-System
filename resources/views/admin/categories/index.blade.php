@extends('layouts.admin')
@section('content')

<section class="content-header">
      <h1>
        Categories
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Categories</li>
      </ol>
    </section>
    <section class="content">
    	<div class="container-fluid">
    		<!-- <p>
    			<a href="{{ url('cat') }}" class="btn btn-primary">Add New Category</a>
    		</p> -->
    		<table class="table table-responsive table-striped">
    			<tr>
    				<th>ID</th>
    				<th>Title</th>
            <th>Description</th>
    				<th>Editing</th>
            <th>Deleting</th>
    			</tr>
    			@foreach($categories as $c)
    			<tr>
    				<td>{{$c->id}}</td>
    				<td>{{$c->title}}</td>
            <td>{{$c->description}}</td>
            <td><a href="{{action('CategoriesController@edit',$c['id'])}}">Edit</a> 
            </td>
    				<!-- <button class="btn btn-info" data-mytitle="{{$c->title}}" data-mydescription="{{$c->description}}" data-toggle="modal" data-target="#edit" data-catid={{$c->id}}>Edit</button> -->
                        
    				<td>	<form method="post" class="delete_form" action="{{action('CategoriesController@destroy' ,$c['id'])}}">
                           {{csrf_field()}}
                           <input type="hidden" name="_method" value="DELETE" />
            <button class="btn btn-danger" type="submit">Delete</button>
          </form><form method="post" class="delete_form" action="{{action('CategoriesController@destroy',$c['id'])}}">
                           {{csrf_field()}}
                           <input type="hidden" name="_method" value="DELETE" />
            <button class="btn btn-danger" type="submit">Delet</button>
          </form>
                    
    				</td> 
    				{{ csrf_field() }}
    			</tr>
    			@endforeach
          <h1>{{$a}}</h1>
    		</table>
    	</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  add
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">save title</h4>
      </div>
      <form action="{{route('category.store')}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
      <div class="modal-body">
     
         <div class="form-group">
             <label for="title">Title</label>
             <input type="text" name="title" id="title" placeholder="enter title" class="form-control">
         </div>
         <div class="form-group">
             <label for="description">Description</label>
             <input type="text" name="description" id="description" cols="20" rows="5" class="form-control">
         </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>
<!--  edit Modal -->
<!-- <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">save title</h4>
      </div>
      <form action="{{route('category.update','test')}}" method="POST">
        {{method_field('store')}}
        {{csrf_field()}}
        <input type="hidden" name="category_id" value="" id="cat_id">
      <div class="modal-body">
     
         <div class="form-group">
             <label for="title">Title</label>
             <input type="text" name="title" id="title" placeholder="enter title" class="form-control">
         </div>
         <div class="form-group">
             <label for="description">Description</label>
             <input type="text" name="description" id="description" cols="20" rows="5" class="form-control">
         </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>
 fcwydgvuhsabijop edit

 edit Modal -->
<!-- <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">delete category</h4>
      </div>
      <form action="{{route('category.destroy','test')}}" method="POST">
        {{method_field('delete')}}
        {{csrf_field()}}
        <input type="hidden" name="category_id" value="" id="cat_id">
      <div class="modal-body">
     
        <p class="center">are you sure you want to delete?</p>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">delete</button>
      </div>
       </form>
    </div>
  </div>
</div> --> 
<!-- fcwydgvuhsabijop edit --> 
</section>
<script>
  $(document).ready(function(){
    $('.delete_form').on('submit',function(){
      if (confirm("Are u sure u want to delete it?")) {
        return true;
      }
      else{
        return false;
      }
    });
  });
</script>
@endsection