@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">Report for single person</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/personalreport')}}">See personal report </a> </li>
    					<li class="breadcrumb-item active"></li>
    				</ol>
    			</div>
    		</div>
    	</div>

    </div>

    
<div class="box">
<div id="myTabContent" class="maincontainer" >

<section class="content">
    <div class="container">
    	@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    
<div>
         <div class="table-responsive">
                    <h3 align="center"> Total Data:<span id="total-records"></span></h3>
            <table class="table table-bordered table-striped" id="table11">
                    <thead>
                       @foreach($abalats as $abal)
                      @if($abal->code==$aa)
                        <tr>
                        <th>photo</th>
                        <th>Code</th>
                        <th>name</th>
                        <th>fname</th>
                        <th>gfname</th>
                        <th>mname</th>
                       <th>phone</th>
                        <th>werasi</th>
                        <th>qebelie</th>
                        <th>child/mature</th>
                         <th>education level</th>
                    
                    </tr>
                    </thead>
                    <tr>
                         <th><img src="{{asset('uploads/members/' . $abal->image)}}" width="100px;" height="100px;" alt="Image"> </th>
                         <th>{{$abal->code}}</th>
                        <td>{{$abal->name}}</td>
                         <td>{{$abal->fname }} </td>
                        <td>{{$abal->gfname}} </td>
                        <td>{{$abal->mname}} </td>
                        <td>{{$abal->phone }}</td>
                        <td>{{$abal->werasi}}</td>
                        <td>{{$abal->qebelie}}</td>
                        <td>{{$abal->child}} </td>
                        <td>{{$abal->edulevel}} </td>
                                       
                   </tr>
                 @endif
                @endforeach
        </table>
      </div>




     @foreach($abalats as $abal)
       @if($abal->code==$aa && $count>0)
    <h2>Monthly balance information</h2>
    <div class="container">
      <tr>
        <p>Total share = <?php echo $shareTotal;?></p> <p>    Total saving = <?php echo $savingTotal;?></p>
      </tr>
      <tr>
        <p>Total interest = <?php echo $interestTotal;?></p> <p>    Total amount = <?php echo $amountTotal;?></p>
      </tr>
       <tr>
        <p>Total number of months saved = <?php echo $count;?></p> <p>    Total ዘምፀኦም ሰባት = <?php echo $sub?></p>
      </tr>
       <tr>
        <p>can he/she possible to take a loan? = <?php echo $countAlert;?></p> <p>    Total possible loan = <?php echo $possibleLoan?></p>
      </tr>
    </div>
     @endif
     @endforeach
        
     @foreach($abalats as $abal)
       @if($abal->code==$aa && $countChild>0)
    <h2>child with shares balance information</h2>
    <div class="container">
      <tr>
        <p>Total share = <?php echo $sharetotalChild;?></p> <p>    Total saving = <?php echo $savingtotalChild;?></p>
      </tr>
      <tr>
        <p>Total interest = <?php echo $interesttotalChild;?></p> <p>    Total amount = <?php echo $amounttotalChild;?></p>
      </tr>
       <tr>
        <p>Total number of months saved = <?php echo $countChild;?></p>
      </tr>
       <tr>
        
      </tr>
    </div>
     @endif
     @endforeach

         @foreach($voluntaries as $abal)
       @if($abal->id==$aa && $countVoluntary>0)
    <h2>Voluntary balance information</h2>
    <div class="container">

      <tr>
        <p>Total interest = <?php echo $interesttotalVoluntary;?></p> <p>    Total amount = <?php echo $amounttotalVoluntary;?></p>
      </tr>
       <tr>
        <p>Total number of months saved = <?php echo $countVoluntary;?></p>
      </tr>
       <tr>
        
      </tr>
    </div>
     @endif
     @endforeach
     
         @foreach($timelimits as $abal)
       @if($abal->id==$aa && $countTimelimit>0)
    <h2>timelimit balance information</h2>
    <div class="container">

      <tr>
        <p>Total interest = <?php echo $interesttotalTimelimit;?></p> <p>    Total amount = <?php echo $amounttotalTimelimit;?></p>
      </tr>
       <tr>
        <p>Total number of months saved = <?php echo $countTimelimit;?></p>
      </tr>
       <tr>
        
      </tr>
    </div>
     @endif
     @endforeach
     @foreach($investments as $abal)
       @if($abal->id==$aa && $countInvestment>0)
    <h2>investment balance information</h2>
    <div class="container">

      <tr>
        <p>Total interest = <?php echo $interesttotalInvestment;?></p> <p>    Total amount = <?php echo $amounttotalInvestment;?></p>
      </tr>
       <tr>
        <p>Total number of months saved = <?php echo $countInvestment;?></p>
      </tr>
       <tr>
        
      </tr>
    </div>
     @endif
     @endforeach
     @foreach($childrens as $abal)
       @if($abal->id==$aa && $countChildren>0)
    <h2>children balance information</h2>
    <div class="container">

      <tr>
        <p>Total interest = <?php echo $interesttotalChildren;?></p> <p>    Total amount = <?php echo $amounttotalChildren;;?></p>
      </tr>
       <tr>
        <p>Total number of months saved = <?php echo $countChildren;;?></p>
      </tr>
       <tr>
        
      </tr>
    </div>
     @endif
     @endforeach
     @foreach($frees as $abal)
       @if($abal->id==$aa && $countfree>0)
    <h2>investment balance information</h2>
    <div class="container">

      <tr>
        <p>Total interest = <?php echo $interesttotalFree;?></p> <p>    Total amount = <?php echo $amounttotalFree;?></p>
      </tr>
       <tr>
        <p>Total number of months saved = <?php echo $countfree;?></p>
      </tr>
       <tr>
        
      </tr>
    </div>
     @endif
     @endforeach
        </div>
    		</section>	
    	</div>
  
</div>
    
 @endsection