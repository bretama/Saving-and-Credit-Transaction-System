@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{url('/home')}}">Dashboard</a> </li>
            
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
  

                   
            </div>
        
            <div class="container box">
                <h2 align="center"> R</h2><br>
                <div class="panel panel-default">
                   <h2>abalat report </h2>

         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                 
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>No.</th>
                        <th>Fullname</th>
                        <th>Gen.</th>
                        <th>Reg</th>
                       
                        <th>Occup</th>

                       <th>Entrydate</th>
                     
                       
                      
                    </tr>
              
                     
                      @foreach($abalmonth as $monthly)


                     <tr>
                        <td>{{$monthly->code}}</td>
                        <td>{{$monthly->name}} {{$monthly->fname}}</td>
                        <td>{{$monthly->phone}}</td>
                        <td>{{$monthly->gender}}</td>
                        <td>{{$monthly->occupation}}</td>
                        <td>{{$monthly->entrydates}}</td>
                    
                    </tr>
                  
                @endforeach
               
                <tbody>
                    
                </tbody>
            </table>
             
           
        </div>
              
      
        </div>
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

 @section('script')
 <script type="text/javascript">
 $(document).ready(function(){();
    fetch_monthlysaving();
    function fetch_monthlysaving(query = '')
    {
    $.ajax({
        url:"{{ route('live_search.action')}}",
        method:"GET",
        data:{query:query},
        dataType:'json'
        success:function(data)
        {
            $('tbody').html(data.table_data);
            $('#total-records').text(data.total_data);
        }
    })
}
 })
</script>
 @endsection