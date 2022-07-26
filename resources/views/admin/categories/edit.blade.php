

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">save title</h4>
      </div>
      <h3 align="center">edit data</h3>
    <br />
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success')}}</p>
    </div>
    @endif 
<form action="{{action('CategoriesController@update', $id)}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH" />
      <div class="modal-body">
     
         <div class="form-group">
             <!-- <label for="title">Title</label> -->
             <input type="text" name="title" id="title" placeholder="enter title" class="form-control" value="{{$category->title}}">
         </div>
         <div class="form-group">
             <!-- <label for="description">Description</label> -->
             <input type="text" value="{{$category->description}}" name="description" id="description" cols="20" rows="5" class="form-control">
         </div>
         <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Edit">
         </div>
    </div>
  </div>
</div>

