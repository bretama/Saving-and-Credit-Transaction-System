<div class="container">
	<div class="row">
		<div class="col-sm-7">
			<h3>simple crud</h3>
		</div>
		<div class="col-sm-5">
			<div class="pull-right">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search title" name="">
					<div class="input-group-btn">
						<button type="submit" name="button" class="btn btn-primary">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th width="60px">No.</th>
				<th>title posts</th>
				<th>description</th>
				<th>
					<a href="#" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i>New Post</a>
				</th>
			</tr>
		</thead>
		<tbody>
			@php
			$i = 1;
			@endphp
			@foreach($posts as $key->value)
			  <tr>
			  	<td>{{$i++}}</td>
			  	<td>{{$value->title}}</td>
			  	<td>{{$value->description}}</td>
			  	<td>{{$value->created_at}}</td>
			  	<td>{{$value->updated_at}}</td>
			  	<td>
			  		<a href="#" class="btn btn-xs btn-info">Show</a>
			  		<a href="#" class="btn btn-xs btn-warning">edit</a>
			  		<a href="#" class="btn btn-xs btn-danger">delete</a>

			  	</td>
		</tbody>
	</table>
	<ul class="pagination">
		{{$posts->links()}}
	</ul>
</div>