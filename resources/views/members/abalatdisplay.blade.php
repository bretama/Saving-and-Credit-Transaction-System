@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">list of Members</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/home')}}">Dashboard</a> </li>
    					<li class="breadcrumb-item active">List</li>
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
          <div class="col-md-6" align="right">
                
            <form action="{{url('/abalatsearch')}}" method="get" role="search">
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
    		<p>

    			<a href="{{url('/registerabalat')}} " class="btn btn-primary pull-center"> Register Members</a>

    		</p>
            <!-- <button class="btn btn-info pull-left btn-xs" id="read-data">load</button> -->
            <div class="table-responsive">
    		<table class="table table-bordered table-striped ">
    			<tr>
                    <th width="100px">Image</th>
    				<th width="1000px">Account Number</th>
    				<th>Name</th>
    				<th>fname</th>
    				<th>gfname</th>
                    <th>mother name</th>
                    <th>gender</th>
                    <th>reg_fee</th>
                    <th>receipt</th>
                    <th>bank</th>
                    <th>werasi</th>
                    <th>id number</th>
                    <th>id given date</th>
    				<th>dob</th>
    				<th>wereda</th>
                    <th>sub-town</th>
                    <th>qebelie</th>
    				<th>phone</th>
    				<th>ocupation</th>
    				<th>education level</th>
    			<!-- <th>hisab quxri</th> -->
                    <th>numberofF</th>
                    <th>numberofM</th>
                    <th>totalfmember</th>
    				<th>entry date</th>
    				<!-- <th>leave date</th> -->
    				<!-- <th>reason</th> -->
                    
    				<th>Edit</th>
    				<th>delete</th>
               <th></th>
               <th></th>  
               <th></th>
               <th></th> 
               <th></th>
               <th></th>
               <th></th>
               <th></th> 
    			</tr>
                @foreach($abalats as $abal)
    			<tr id="abalats">
                  
                      <td><img src="{{asset('uploads/members/' . $abal->image)}}" width="100px;" height="100px;" alt="Image"> </td>
                     
        				<th> {{$abal->code}} </a></th>
        				<th>{{$abal->name}}</th>
        				<th>{{$abal->fname}} </th>
        				<th>{{$abal->gfname}}</th>
        				<th>{{$abal->mname}}</th>
        				<th>{{$abal->gender}}</th>
        				<th>{{$abal->rbirr}}</th>
        				<th>{{$abal->receipt}}</th>
                        <th> {{$abal->bank}} </th>
                        <th>{{$abal->werasi}}</th>
                        <th>{{$abal->idnum}} </th>
                        <th>{{$abal->idgiven}}</th>
                        <th>{{$abal->dob}}</th>
                        <th>{{$abal->wereda}}</th>
                        <th>{{$abal->town}}</th>
                        <th>{{$abal->qebelie}}</th>
                        <th> {{$abal->phone}} </th>
                        <th>{{$abal->occupation}}</th>
                        <th>{{$abal->edulevel}} </th>
                        
                        <th>{{$abal->numfe}}</th>
                        <th>{{$abal->nummale}}</th>
                        <th>{{$abal->total}}</th>
                        <th>{{$abal->entrydates}}</th>
                       
                       

                    

        			     <th><a href="abalatedit/{{$abal->id}}" class="btn btn-info">Edit</a></th>
                        <th><form action="abalatdelete/{{$abal->id}}" method="post" class="delete-form"> {{csrf_field()}}
                    <button type="submit" class="btn btn-danger"> Delete </button>
                            
                        </form> 
                       
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                         <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                      
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
     <script type="text/javascript">
     $(document).ready(function(){
       $('.btnprint').printPage();
        });
 </script>

 @endsection

  @section('script')
  <script type="text/javascript">
     var table1 = $('#contact-table').DataTable({
        processing:true,
        serverSide:true,
        ajax: "{{route('abalatss')}}",
        column: [
       {data:'id',name:'id'}
       {data:'name',name:'name'}
       {data:'fname',name:'fname'}
       {data:'gfname',name:'gfname'}
       {data:'gender',name:'gender'}
       {data:'rbirr',name:'rbirr'}
       {data:'receipt',name:'receipt'}
       {data:'bank',name:'bank'}
       {data:'werasi',name:'werasi'}
       {data:'idnum',name:'idnum'}
       {data:'idgiven',name:'idgiven'}
       {data:'dob',name:'dob'}
       {data:'wereda',name:'wereda'}
       {data:'town',name:'town'}
       {data:'qebelie',name:'qebelie'}
       {data:'phone',name:'phone'}

       {data:'occupation',name:'occupation'}
       {data:'edulevel',name:'edulevel'}
       {data:'account',name:'account'}
       {data:'numfe',name:'numfe'}
       {data:'nummale',name:'nummale'}
       {data:'total',name:'total'}
       {data:'entrydate',name:'entrydate'}
       {data:'leavedate',name:'leavedate'}
       {data:'idea',name:'idea'}
       
        {data:'action',name:'action'.orderable:false,searchacle:false}
        ]
     });
  </script> 

  @endsection