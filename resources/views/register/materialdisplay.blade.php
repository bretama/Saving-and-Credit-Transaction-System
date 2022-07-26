@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of materials</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">dash board</a> </li>
    					<li class="breadcrumb-item active">materials </li>
    				</ol>
    			</div>
    		</div>
    	</div>

    </div>

    <section class="content">


    <div class="container">
       
    	<div class="container-fluid">
    <div class="box box-primary">
     <div class="row">
        <div class="col-md-2">
                <a href="{{url('/materialregister')}} " class="btn btn-primary"> materials used</a>
         </div>
        <div class="col-md-6" align="right">
                
            <form action="/search1" method="get" role="search">
            {{ csrf_field() }}
            <div class="input-group col-md-4" align="right">
                <input type="text" class="col-md-2 form-control" name="search"
                    placeholder="Search users"> 
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>

                   
            </div>
            
        </div>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                
                <tr>
                    <th>type of material</th>
                    <th>number of materials bought</th>
                    <th>moneyToBuy one</th>
                    <th>nameOfBuyer</th>
                    <th>sum of maney</th>
                    <th>date </th>
                    <!-- <th>ቅፅዓት</th> -->
                    <th>month</th>
                    <th>edit</th>
                    <th class="col-xs-4">delete</th>
                </tr>
                @foreach($materials as $material)
                <tr>
                  
                   <td>{{$material->type}} </td>
                   <td>{{$material->numma}} </td>
                    <td>{{$material->moneyToBuy}} </td>
                    <td>{{$material->nameOfBuyer}} </td>
                    <td>{{$material->sum}} </td>
                    <td>{{$material->date}} </td>
                    <td>{{$material->month}}</td>
                    
                   
                    
                    
                    
                    <td><a href="materialedit/{{$material->id}}" class="btn btn-info">edit</a> </td>
                        <td><form action="materialdelete/{{$material->id}}" method="post" class="delete-form"> {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">delete</button>
                            
                        </form> 
                       
                    </td>
                    
                </tr>
                @endforeach
         
                
    		</table>
    	</div>
    </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete-form').on('submit',function(){
            if (confirm("Are you sure you want to Delete it?")) {
                return true;
            }
            else{
                return false;
            }
        });
    });
</script>
    </section>

 @endsection

 <!-- @section('scrip') -->