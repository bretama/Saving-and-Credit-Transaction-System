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
                   <h2>New abalat report and their saving</h2>
         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                 
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>male</th>
                        <th>female</th>
                        <th>total</th>
                        <th>share</th>
                        <th>saving</th>
                        <th>Registration fee</th>
                       
                       

                    </tr>
               <tr>
                  <td>{{$monthlycountthismonthm}}</td>
                  <td>{{$monthlycountthismonthf}}</td>
                  <td>{{$monthlycountthismonthtotal}}</td>

                  <td>{{$monthlysharethismonth}}</td>
                  <td>{{$monthlysavingthismonth}}</td>
                  <td>{{$monthlysavingthismonthfee}}</td>
                 

               </tr>
                 
                <tbody>
                    
                </tbody>
            </table>
             
        </div>


 <h2>old abalat report and their saving</h2>
         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                 
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>shareM</th>
                        <th>shareF</th>
                        <th>total</th>
                        <th>savingM</th>
                        <th>savingF</th>
                        <th>total</th>
                        <th>numberM</th>
                        <th>numberF</th>
                        <th>total</th>
                       
                       

                    </tr>
               <tr>
                  <td>{{$monthlysharelastm}}</td>
                  <td>{{$monthlysharelastf}}</td>
                  <td>{{$monthlysharelast}}</td>

                  <td>{{$monnthlysavinglastm}}</td>
                  <td>{{$monthlysavinglastf}}</td>
                  <td>{{$monthlysavinglast}}</td>

                 <td>{{$monnthlycountlastm}}</td>
                  <td>{{$monnthlycountlastf}}</td>
                  <td>{{$monthlycountlast}}</td>

               </tr>
                 
                <tbody>
                    
                </tbody>
            </table>
             
        </div>



<h2>new children report and their saving</h2>
         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                 
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>shareM</th>
                        <th>shareF</th>
                        <th>total</th>
                        <th>savingM</th>
                        <th>savingF</th>
                        <th>total</th>
                        <th>numberM</th>
                        <th>numberF</th>
                        <th>total</th>
                        <th>fee</th>
                       
                       

                    </tr>
               <tr>
                  <td>{{$childrensharethismonthm}}</td>
                  <td>{{$childrensharethismonthf}}</td>
                  <td>{{$childrensharethismonth}}</td>

                  <td>{{$childrensavingthismonthm}}</td>
                  <td>{{$childrensavingthismonthf}}</td>
                  <td>{{$childrensavingthismonth}}</td>

                 <td>{{$childrencountthismonthm}}</td>
                  <td>{{$childrencountthismonthf}}</td>
                  <td>{{$childrencountthismonthtotal}}</td>
                  <td>{{$childrensavingthismonthfee}}</td>

               </tr>
                 
                <tbody>
                    
                </tbody>
            </table>
             
        </div>

        <h2>old children report in this month and their saving</h2>
         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                 
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>shareM</th>
                        <th>shareF</th>
                        <th>total</th>
                        <th>savingM</th>
                        <th>savingF</th>
                        <th>total</th>
                        <th>numberM</th>
                        <th>numberF</th>
                        <th>total</th>
                        
                       
                       

                    </tr>
               <tr>
                  <td>{{$childrensharelastm}}</td>
                  <td>{{$childrensharelastf}}</td>
                  <td>{{$childrensharetotal}}</td>

                  <td>{{$childrensavinglastm}}</td>
                  <td>{{$childrensavinglastf}}</td>
                  <td>{{$childrensavingtotal}}</td>

                 <td>{{$childrencountlastm}}</td>
                  <td>{{$childrencountlastf}}</td>
                  <td>{{$childrencounttotal}}</td>
                  

               </tr>
                 
                <tbody>
                    
                </tbody>
            </table>
             
        </div>

         <h2>old children report out of this month and their saving</h2>
         <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                 
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>shareM</th>
                        <th>shareF</th>
                        <th>total</th>
                        <th>savingM</th>
                        <th>savingF</th>
                        <th>total</th>
                        <th>numberM</th>
                        <th>numberF</th>
                        <th>total</th>
                        
                       
                       

                    </tr>
               <tr>
                  <td>{{$childrensharetillnowm}}</td>
                  <td>{{$childrensharetillnowf}}</td>
                  <td>{{$totalchildrensharetillnow}}</td>

                  <td>{{$childrenamounttillnowm}}</td>
                  <td>{{$childrenamounttillnowf}}</td>
                  <td>{{$totalchildrenamounttillnow}}</td>

                 <td>{{$childrentillnowm}}</td>
                  <td>{{$childrentillnowf}}</td>
                  <td>{{$totalchildrentillnow}}</td>
                  

               </tr>
                 
                <tbody>
                    
                </tbody>
            </table>
             
        </div>


                 <!-- <a href="{{ URL::to('/customers') }}">Export PDF</a> -->
                 <h1>monthly saving report</h1>
                <div class="table-responsive">
                   
            <table class="table table-bordered table-striped" id="table11">
                   
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>Amount</th>
                        <th>saving</th>
                        <th>share</th>
                        <th>Adminfee</th>
                        <th>Interest</th>
                        <th>Abalats in monthly</th>
                        <th>Male</th>
                        <th>Female</th>
                 
                      
                    </tr>
                   
                   
                    <tr>
                        <td>{{$monthlyamount}}</td>
                        <td>{{$monthlysaving}}</td>
                        <td>{{$monthlyshare}}</td>
                        <td>{{$monthlyadmi}}</td>
                        <td>{{$monthlyinterest}}</td>
                        <td>{{$monthlyabalats}} </td>
                        <td>{{$monthlymale}} </td>
                         <td>{{$monthlyfemale}}</td>
                        
                      
                       
                            
                            
                            
              </tr>
               
                
                <tbody>
                    
                </tbody>
        </table>
           
                
      </div>

       
        <h2>Voluntary Saving report = {{$voluntaryamount}}</h2>
         
        <h2>Children Saving report = {{$childrenamount}} </h2>
        
        <h2>Investment Saving report = {{$investmentamount}}</h2>
       
 
        <h2>share only report = {{$shareamount}}</h2>
       
        <h1>penality report</h1>
                <div class="table-responsive">
                   
                <table class="table table-bordered table-striped" id="table11">
                    
                        <tr>
                        <!-- <th>Image</th> -->
                    
                        <th>Members punished</th>
                        <th>penality</th>
                        
                        
                      
                    </tr>
                   
                    
                    <tr>
                        <td>{{$abalpenalitycount}}</td>
                        <td>{{$abalpenalityamount}}</td>
                       

                            
                    </tr>
              
                
                <tbody>
                    
                </tbody>
            </table>
           
                
                
        </div>
      <h1>all over total amount intered=={{$totalbirr}}</h1>
      <h1>all over total interest == {{$totalinterestbirr}}</h1>
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