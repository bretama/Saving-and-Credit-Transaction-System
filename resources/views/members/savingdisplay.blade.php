@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ዕቋር ርአ</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <a href="{{url('/')}}">ዳሽ ቦርድ</a> </li>
                        <li class="breadcrumb-item active">ዕቋር ርአ</li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
    <section class="content">
        <div class="container-fluid">
    <div class="box box-primary">
        <div class="box-header with-border">
            <p>
                <a href="{{url('/addsaving')}} " class="btn btn-primary"> ዕቋር ኣእቱ</a>
            </p>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ኮድ</th>
                    <th>ዓይነት ዕቋር</th>
                    <th>ዘእተዎ መጠን</th>
                    <th>ኣስተኻኽል</th>
                    <th>ኣጥፍእ</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="#" class="btn btn-info">ኣስተካክል</a> </td>
                    <td><a href="#" class="btn btn-danger">ኣጥፍእ</a> </td>
                </tr>
            </table>
        </div>
    </div>
</div>
    </section>
 @endsection