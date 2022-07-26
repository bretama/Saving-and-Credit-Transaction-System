@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Importing Members</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <a href="{{url('/')}}">dash board</a> </li>
                        
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
        <div class="card-body">
            <form action="{{ url('/importexcel2') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field()}}
                @if(session('errors'))
                 @foreach($errors as $error)
                  <li>{{$error}}</li>
                @endforeach
                @endif
                @if(session('success'))
                    {{session('success')}}
                @endif
                select excel file to upload
                <br><br>
                <input type="file" name="file" id="file">
                <br>
                <br>
                <button type="submit">upload Abalat</button>
                <br><br>
                <a class="btn btn-warning" href="{{ route('export') }}">Export Abalat</a>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</section>
@endsection