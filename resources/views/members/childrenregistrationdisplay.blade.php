@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">ናይ ህፃውንቲ ዝርዝር</h1>

    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item"> <a href="{{url('/')}}">ዳሽ ቦርድ</a> </li>
    					<li class="breadcrumb-item active">መዝገብ ህፃውንቲ</li>
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
    			<a href="{{url('/register')}} " class="btn btn-primary"> ህፃውንቲ መዝግብ</a>
    		</p>
            <div class="table-responsive">
    		<table class="table table-bordered table-striped">
    			<tr>
    				<th>ኮድ</th>
    				<th>ሽም</th>
    				<th>ሽም ኣቦ</th>
    				<th>ሽም ኣቦሓጎ</th>
                    <th>ሽም ኣዶ</th>
                    <th>ፆታ</th>
                    <th>ደረሰኝ</th>
                    <th>ኣታዊ ዝተገብረሉ ባንኪ</th>
                    <th>ወራሲ</th>
                    <!-- <th>መታወቅያ ቁፅሪ</th>
                    <th>መታወቅያ ዝተውሃበሉ ዕለት</th> -->
    				<th>ዝተወለደሉ ዕለት</th>
    				<th>ወረዳ</th>
                    <th>ክፍለ-ከተማ</th>
                    <th>ጣብያ</th>
    				<th>ስልኪ</th>
    				<th>ዝተዋፈረሉ ስራሕ</th>
    				<th>ደረጃ ት/ቲ</th>
    				<th>ሒሳብ ቁፅሪ</th>
                   <!--  <th>በዝሒ ስድራ ኣን</th>
                    <th>በዝሒ ስድራ ተባ</th>
                    <th>በዝሒ ስድራ</th> -->
    				<th>ዝኣተወሉ ዕለት</th>
    				<th>ዝተሰናበተሉ ዕለት</th>
    				<th>መብርሂ</th>
    				<th>ኣስተኻኽል</th>
    				<th>ኣጥፍእ</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <td> </td>
                    <td> </td>
    			</tr>
                @foreach($abalats as $abal)
    			<tr>
                    <!-- @if(count($abalats) > 1) -->
                     
        				<td><a href="/abalatinfo"> {{$abal->code}} </a></td>
        				<td>{{$abal->name}}</td>
        				<td>{{$abal->fname}} </td>
        				<td>{{$abal->gfname}}</td>
        				<td>{{$abal->mname}}</td>
        				<td>{{$abal->gender}}</td>
        				<!-- <td>{{$abal->rbirr}}</td> -->
        				<td>{{$abal->receipt}}</td>
                        <td> {{$abal->bank}} </td>
                        <td>{{$abal->werasi}}</td>
                       <!--  <td>{{$abal->idnum}} </td>
                        <td>{{$abal->idgiven}}</td> -->
                        <td>{{$abal->dob}}</td>
                        <td>{{$abal->wereda}}</td>
                        <td>{{$abal->town}}</td>
                        <td>{{$abal->qebelie}}</td>
                        <td> {{$abal->phone}} </td>
                        <td>{{$abal->occupation}}</td>
                        <td>{{$abal->edulevel}} </td>
                        <td>{{$abal->account}}</td>
                       <!--  <td>{{$abal->numfe}}</td>
                        <td>{{$abal->nummale}}</td>
                        <td>{{$abal->total}}</td> -->
                        <td>{{$abal->entrydate}}</td>
                        <td> {{$abal->leavedate}} </td>
                        <td>{{$abal->idea}}</td>

                    

        			     <td><a href="editinfo/{{$abal->code}}" class="btn btn-info">ኣስተካክል</a> </td>
        				<td><a href="#" class="btn btn-danger">ኣጥፍእ</a> </td>
                        <td>  </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>  </td>
                        
                        <!-- @endif -->
    			</tr>
                @endforeach
    		</table>
    	</div>
    </div>
    </div>
</div>
</div>
</div>

    </section>

 @endsection

 <!-- @section('scrip') -->