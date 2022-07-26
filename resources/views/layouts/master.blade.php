<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel DataTables Tutorial - Desertebs</title>

        <!-- Bootstrap CSS -->
        <link href="{{asset('csss/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('csss/jquery.dataTables.min.css')}}">

        <style>
            body {
                padding-top: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <!-- jQuery -->
        <script src="{{asset('jss/jquery.js')}}"></script>
        <!-- DataTables -->
        <script src="{{asset('jss/jquery.dataTables.min.js')}}"></script>
        <!-- Bootstrap JavaScript -->
        <script src="{{asset('jss/bootstrap.min.js')}}"></script>
        <!-- App scripts -->
        @stack('scripts')
    </body>
</html>