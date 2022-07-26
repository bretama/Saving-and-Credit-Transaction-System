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
                <h2 align="center"> Report</h2><br>
                <div class="panel panel-default">
                 <!-- <a href="{{ URL::to('/customers') }}">Export PDF</a> -->
                 <h1>monthly saving report</h1>
                <div class="table-responsive">
                   
        		<table class="table table-bordered table-striped" id="table11">
                   
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>No.</th>
                        <th>Fname</th>
                        <th>Gen</th>
                        <th>Am.</th>
                        <th>Save</th>
                        <th>Share</th>
                        <th>adm</th>
                        <th>Occup</th>
                       <th>Entry_date</th>
                        <th>inter</th>
                      
                    </tr>
                   
                     @foreach($abalmonth as $monthly)
                    <tr>
                        <td>{{$monthly->accountNum}}</td>
                        <td>{{$monthly->name}} {{$monthly->fname}}</td>
                        <td>{{$monthly->gender}}</td>
                        <td>{{$monthly->amount}}</td>
                        <td>{{$monthly->saving}} </td>
                        <td>{{$monthly->share }} </td>
                        <td>{{$monthly->sem1 }} </td>
                        <td>{{$monthly->occupation}}</td>
                        <td>{{$monthly->entrydate}}</td>
                      
                        <td>{{$monthly->interest }} </td>
                      
            			     
                            
                            
                            
        			</tr>
                @endforeach
                
                <tbody>
                    
                </tbody>
    		</table>
           <h4>total amount in this month={{$monthlyamount}}</h4>
                <h4>total Saving in this month={{$monthlysaving}}</h4>
                <h4>total share in this month={{$monthlyshare}}</h4>
                 
                 <h4>total members who save in this month {{$monthlyabalats}}</h4>
                 <h4>total mele members who save in this month {{$monthlymale}}</h4>
                 <h4>total female members who save in this month {{$monthlyfemale}}</h4>
                
    	</div>
        <h2>Voluntary Saving report</h2>
         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                 
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>Account</th>
                        <th>Full name</th>
                        <th>Gender</th>
                        <th>Amount</th>
                       
                        <th>Occupation</th>

                       <th>Entrydate</th>
                     
                        <th>Interest</th>
                      
                    </tr>
              
                     @foreach($voluntary as $monthly)
                    <tr>
                        <td>{{$monthly->accountNum}}</td>
                        <td>{{$monthly->name}} {{$monthly->fname}}</td>
                        <td>{{$monthly->gender}}</td>
                        <td>{{$monthly->amount}}</td>
                       
                        <td>{{$monthly->occupation}}</td>
                        <td>{{$monthly->entrydate}}</td>
                       
                        <td>{{$monthly->interest }} </td>
                      
                             
                            
                            
                            
                    </tr>
                @endforeach
               
                <tbody>
                    
                </tbody>
            </table>
             <h4>total amount in voluntary saving {{$voluntaryamount}}</h4>
           
        </div>
        <h2>Children Saving report</h2>
         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                  
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>Account</th>
                        <th>Full name</th>
                        <th>Gender</th>
                        <th>Amount</th>
                        
                        <th>Occupation</th>

                       <th>Entrydate</th>
                      
                        <th>Interest</th>
                      
                    </tr>
                  
                     @foreach($children as $monthly)
                    <tr>
                        <td>{{$monthly->accountNum}}</td>
                        <td>{{$monthly->name}} {{$monthly->fname}}</td>
                        <td>{{$monthly->gender}}</td>
                        <td>{{$monthly->amount}}</td>
                        
                        <td>{{$monthly->occupation}}</td>
                        <td>{{$monthly->entrydate}}</td>
                        
                        <td>{{$monthly->interest }} </td>
                      
                             
                            
                            
                            
                    </tr>
                @endforeach
                
                <tbody>
                    
                </tbody>
            </table>
            <h4>total amount in children saving {{$childrenamount}}</h4>
          
        </div>
        <h2>Investment Saving report</h2>
         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                   
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>Account</th>
                        <th>Full name</th>
                        <th>Gender</th>
                        <th>Amount</th>
                     
                        <th>Occupation</th>

                       <th>Entrydate</th>
                       
                        <th>Interest</th>
                      
                    </tr>
                 
                     @foreach($investment as $monthly)
                    <tr>
                        <td>{{$monthly->accountNum}}</td>
                        <td>{{$monthly->name}} {{$monthly->fname}}</td>
                        <td>{{$monthly->gender}}</td>
                        <td>{{$monthly->amount}}</td>
                       
                        <td>{{$monthly->occupation}}</td>
                        <td>{{$monthly->entrydate}}</td>
                      
                        <td>{{$monthly->interest }} </td>
                      
                             
                            
                            
                            
                    </tr>
                @endforeach
                
                <tbody>
                    
                </tbody>
            </table>
           <h4>total amount in investment {{$investmentamount}}</h4>
        </div>
        <h2>share only report</h2>
         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
               
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>Account</th>
                        <th>Full name</th>
                        <th>Gender</th>
                        <th>Amount</th>
                        <th>Occupation</th>

                       <th>Entrydate</th>
                       
                        
                      
                    </tr>
                    
                     @foreach($share as $monthly)
                    <tr>
                        <td>{{$monthly->accountNum}}</td>
                        <td>{{$monthly->name}} {{$monthly->fname}}</td>
                        <td>{{$monthly->gender}}</td>
                        <td>{{$monthly->amount}}</td>
                        <td>{{$monthly->occupation}}</td>
                        <td>{{$monthly->entrydate}}</td>
                       
               
                      
                             
                            
                            
                            
                    </tr>
                @endforeach
               
                <tbody>
                    
                </tbody>
            </table>
            <div class="text-sm-right">
               
            </div>
             <h4>total amount in share only {{$shareamount}}</h4>
        </div>
        <h1>penality report</h1>
                <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                    
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>No.</th>
                        <th>Fullname</th>
                        <th>Gen</th>
                        
                        <th>penality</th>
                        <th>Occupation</th>
                       <th>Entrydate</th>
                        
                      
                    </tr>
                   
                     @foreach($abalpenality as $monthly)
                    <tr>
                        <td>{{$monthly->accountNum}}</td>
                        <td>{{$monthly->name}} {{$monthly->fname}}</td>
                        <td>{{$monthly->gender}}</td>
                        <td>{{$monthly->penality}}</td>
                        <td>{{$monthly->occupation}}</td>
                        <td>{{$monthly->entrydate}}</td>

                            
                    </tr>
                @endforeach
                
                <tbody>
                    
                </tbody>
            </table>
           <h4>total members who have punished in this month={{$abalpenalitycount}}</h4>
                <h4>total penality in this month={{$abalpenalityamount}}</h4>
                
                
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