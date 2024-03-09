@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1> 
@stop

@section('content')
<div class="box-header with-border">
    <h3 class="box-title text-left">Entity-Relationship Diagram (ERD) Inventaris Barang</h3>
</div>
<div class="row justify-content-center"> <!-- Menambahkan kelas justify-content-center di sini -->
    <div class="col-md-6">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-bo dy text-center">
                <!-- Place your ERD image or diagram here -->
                <img src="{{ asset('vendor/adminlte/dist/img/petikjombang.png') }}" alt="ERD Inventaris Barang" style="max-width: 100%;">
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
