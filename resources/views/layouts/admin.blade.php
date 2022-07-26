
  <!DOCTYPE html>
<html>
  <head>
    
   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nayna Saving and Credit</title>
       <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    
  <!--   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/validator/12.1.0/validator.min.js"></script> -->

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"> -->
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
     <link href="{{asset('font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <!-- <link href="{{asset('ionicons.min.css')}}" rel="stylesheet" type="text/css" /> -->
    <!-- Morris chart -->
    <link href="{{ asset('plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
     <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
         <link href="{{asset('csss/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('csss/jquery.dataTables.min.css')}}"> -->
    <!-- <link href="../css/awesome-bootstrap-checkbox.css" rel="stylesheet"> -->
     
 <!-- <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">  -->
  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"> -->
    <!-- Date Picker -->
   <!--   <link href="{{ asset('dist/css/jquerybootstrap4.css') }}" rel="stylesheet" type="text/css" /> -->
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet"> 
     
    <script type="text/javascript" src="{{asset('js/jquery1.min.js')}}"></script>

    <!--  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <script src="//code.jquery.com/jquery.js"></script> -->
        <!-- DataTables -->
        <!-- <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script> -->
        <!-- Bootstrap JavaScript -->
        <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
  
  <!-- bootstrap Js --> 
  <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
   
  
    @yield('style')
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo"><b>Dash</b>board</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
           
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/nayna.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Nayna</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/nayna.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Saving and Credit
                      
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#"></a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"></a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"></a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class=""></a>
                    </div>
                    <div class="pull-right">
                      <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign Out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/btg.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Brhane Tamrat</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div> -->
        
          <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
           

          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-circle-o"></i> <span>Membership</span> 
                <i class="fa fa-angle-left pull-right"></i>

              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/listofmembers')}}"><i class="fa fa-circle-o"></i> Members</a></li>
                <!-- <li><a href="{{url('/importExportView')}}"><i class="fa fa-circle-o"></i>Import Members</a></li> -->
               <!--  <li><a href="{{url('/importmonthly')}}"><i class="fa fa-circle-o"></i>Import monthlysaving</a></li> -->
                 <!-- <li><a href="{{url('childrenregistration')}}"><i class="fa fa-circle-o"></i>children register </a></li> -->
              </ul>
            </li>
            <li class="treeview">
              <!-- <a href="#"> -->
                <!-- <i class="fa fa-circle-o"></i> <span>only share</span> -->
                <!-- <i class=" pull-right"></i> -->
              <!-- </a> -->
             <li class="treeview">
              <a href=" ">
                <i class="fa fa-circle-o"></i> <span>Saving</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="{{url('/monthlydisplay')}} "><i class="fa fa-circle-o"></i>Monthly Saving</a></li>
                <li><a href="{{url('/voluntarydisplay')}} "><i class="fa fa-circle-o"></i> Voluntary Saving</a></li>
                <li><a href="{{url('/investmentdisplay')}} "><i class="fa fa-circle-o"></i>Investment Saving</a></li>
                <li><a href="{{url('/timelimitdisplay')}} "><i class="fa fa-circle-o"></i>Time-Limited Saving </a></li>
                <li><a href="{{url('/childrendisplay')}} "><i class="fa fa-circle-o"></i>Children Saving </a></li>
                <li><a href="{{url('/freeinterestdisplay')}} "><i class="fa fa-circle-o"></i>Free-Interest Saving</a></li>
                <li><a href="{{url('/sharedisplay')}} "><i class="fa fa-circle-o"></i>Share Only</a></li>
               
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-circle-o"></i> <span>Loan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="{{url('/normalcreditdisplay')}}"><i class="fa fa-circle-o"></i>Normal Loan</a></li>
                 
                 <li><a href="{{url('/returnnormaldisplay')}}"><i class="fa fa-circle-o"></i>Return Normal Loan</a></li>
                
                <li><a href="{{url('/withdrawaldisplay')}}"><i class="fa fa-circle-o"></i>Voluntary and Time-Limit Withdraw</a></li>
             <!--  <li><a href="/typecreditdisplay"><i class="fa fa-circle-o"></i>by type loan</a></li> -->
              </ul>
            </li>
             <li class="treeview">
              <a href=" ">
                <i class="fa fa-circle-o"></i> <span>Expenses</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/abeldisplay')}} "><i class="fa fa-circle-o"></i>Abel</a></li>
                <li><a href="{{url('/paymentdisplay')}} "><i class="fa fa-circle-o"></i> Payment</a></li>
                <li><a href="{{url('/comissiondisplay')}} "><i class="fa fa-circle-o"></i>Commission</a></li>
                <li><a href="{{url('/teacoffeedisplay')}} "><i class="fa fa-circle-o"></i>TeaCoffee</a></li>
                <li><a href="{{url('/waterdisplay')}} "><i class="fa fa-circle-o"></i>Water </a></li>
                <li><a href="{{url('/additionalexpensedisplay')}} "><i class="fa fa-circle-o"></i> Tele, House Rent, Electricity Expenses</a></li>
                <li><a href="{{url('/materialdisplay')}} "><i class="fa fa-circle-o"></i> Other Materials Expenses</a></li>
               
              </ul>
            </li>
             <li class="treeview">
              <a href=" ">
                <i class="fa fa-circle-o text-aqua"></i> <span> Additional Functions</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/submemberdisplay')}}"><i class="fa fa-circle-o"></i> Sub-Members</a></li>
                <li><a href="{{url('/penalitydisplay')}}"><i class="fa fa-circle-o"></i>Penality</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span>Report</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/personalreport')}}"><i class="fa fa-circle-o"></i> Sub-Members Report</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="{{url('/intervalreport')}}"><i class="fa fa-circle-o"></i>Interval Report</a></li>
                 <li><a href="{{url('/notsaved')}}"><i class="fa fa-circle-o"></i>Members Saved Above Some Amount</a></li>
                 <li><a href="{{url('/totalreport')}}"><i class="fa fa-circle-o"></i>Total Report</a></li>
              </ul>
            
              <ul class="treeview-menu">
                <li class="treeview">
                  
               <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span>Import Report</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/monthlyreport')}}"><i class="fa fa-circle-o"></i>Monthly Report </a></li>
                <li><a href="{{url('/sixmonthreport')}}"><i class="fa fa-circle-o"></i> Six-Months Report </a></li>
                <li><a href="{{url('/yearlyreport')}}"><i class="fa fa-circle-o"></i> Yearly Report</a></li>
                <li><a href="{{url('/daylyreport')}}"><i class="fa fa-circle-o"></i>Daily Report </a></li>
                <li><a href="{{url('/weeklyreport')}}"><i class="fa fa-circle-o"></i> Weekly Report </a></li>
              </ul>
              </li>
              </ul>
               <ul class="treeview-menu">
                <li class="treeview">
               <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> <span>Expenses Report</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/monthlyexpensereport')}}"><i class="fa fa-circle-o"></i>Monthly Expense Report </a></li>
                <li><a href="{{url('/sixmonthexpensereport')}}"><i class="fa fa-circle-o"></i> Six-Months Expense Report </a></li>
                <li><a href="{{url('/yearlyexpensereport')}}"><i class="fa fa-circle-o"></i> Yearly Expense Report</a></li>
                <li><a href="{{url('/daylyexpensereport')}}"><i class="fa fa-circle-o"></i>Diyly Expense Report </a></li>
                <li><a href="{{url('/weeklyexpensereport')}}"><i class="fa fa-circle-o"></i>Weekly Expense Report </a></li>
              </ul>
             
              </li>

              </ul>
            </li>
            <li>
               <!-- <li><a href="{{url('/monthlydisplay1')}} "><i class="fa fa-circle-o"></i>monthly saving(1-128)</a></li>
              <li><a href="{{url('/monthlydisplay2')}} "><i class="fa fa-circle-o"></i>monthly saving(129-256)</a></li>
              <li><a href="{{url('/monthlydisplay3')}} "><i class="fa fa-circle-o"></i>monthly saving(257-384)</a></li>
              <li><a href="{{url('/monthlydisplay4')}} "><i class="fa fa-circle-o"></i>monthly saving(385-512)</a></li>
               <li><a href="{{url('/monthlydisplay5')}} "><i class="fa fa-circle-o"></i>monthly saving(513-640)</a></li>
               <li><a href="{{url('/monthlydisplay6')}} "><i class="fa fa-circle-o"></i>monthly saving(641-768)</a></li>
                <li><a href="{{url('/monthlydisplay7')}} "><i class="fa fa-circle-o"></i>monthly saving(768--)</a></li>
                 <li><a href="{{url('/monthlydisplay8')}} "><i class="fa fa-circle-o"></i>monthly saving(897--)</a></li>
                  <li><a href="{{url('/monthlydisplay12')}} "><i class="fa fa-circle-o"></i>report Auguest</a></li>
                  <li><a href="{{url('/monthlydisplay13')}} "><i class="fa fa-circle-o"></i>report September</a></li>
                  <li><a href="{{url('/monthlydisplay14')}} "><i class="fa fa-circle-o"></i>report October</a></li>
                  <li><a href="{{url('/monthlydisplay15')}} "><i class="fa fa-circle-o"></i>report November</a></li>
                  <li><a href="{{url('/monthlydisplay16')}} "><i class="fa fa-circle-o"></i>report December</a></li>
                  <li><a href="{{url('/monthlydisplay17')}} "><i class="fa fa-circle-o"></i>report January</a></li> -->
          </ul>
          
               
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <!-- <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1> -->
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
    @include('members.messages')
        @yield('content')

      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2019-2020 <a href="http://naynasavingandcredit.com"></a>.</strong> All rights reserved.
      </footer>
       <!-- jQuery -->
        <script src="{{asset('jss/jquery.js')}}"></script>
        <!-- DataTables -->
        <script src="{{asset('jss/jquery.dataTables.min.js')}}"></script>
        <!-- Bootstrap JavaScript -->
        <script src="{{asset('jss/bootstrap.min.js')}}"></script>
 
        <!-- App scripts -->
    </div><!-- ./wrapper -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
  
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
 
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
   
    <script src="{{ asset('dist/js/app.min.js') }}" type="text/javascript"></script>
   
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    
    <!-- datepicker -->
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
   
    <script src="{{ asset('dist/js/pages/dashboard2.js') }}" type="text/javascript"></script>    
    <script src="{{ asset('dist/js/demo.js') }}" type="text/javascript"></script>
     <script src="{{ asset('plugins/chartjs/Chart.min.js') }}" type="text/javascript"></script>
     <!-- <script src="{{ asset('css/dataTables.bootstrap.min.js') }}" type="text/javascript"></script> -->
     <!-- <script src="{{ asset('css/jquery.dataTables.min.js') }}" type="text/javascript"></script> -->

        @yield('scripts')

   
  </body>
</html>
