@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of comissions</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">dashboard</a> </li>
    					<li class="breadcrumb-item active">comissions </li>
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
        <div class="box-header with-border">
    		<p>
    			<a href="{{url('/comissionregister')}} " class="btn btn-primary"> comissions regisration</a>
    		</p>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped" id="table11">
                
                <tr>
                    <th>name</th>

                    <th>fname</th>
                    <th>gfname</th>
                    <th>Type of commision</th>
                    <th>Numbers comming</th>
                    <th>month</th>
                    <th>entry_date</th>
                    <th>total</th>
                 
                   
                    <th>Edit</th>

                    <th class="col-xs-4">delete</th>
                </tr>
                @foreach($comissions as $comission)
                <tr>
                  
                   <td>{{$comission->name}} </td>
                    <td>{{$comission->fname}} </td>
                    <td>{{$comission->gfname}} </td>
                    <td>{{$comission->typedone}} </td>
                    <td>{{$comission->numcoming}} </td>
                    <td>{{$comission->month}}</td>
                    <td>{{$comission->entrydate}} </td>
                    <td>{{$comission->total}} </td>
                    
                    <td><a href="comissionedit/{{$comission->id}}" class="btn btn-info">Edit</a> </td>
                        <td><form action="comissiondelete/{{$comission->id}}" method="post" class="delete-form"> {{csrf_field()}}
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