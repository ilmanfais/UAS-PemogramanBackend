@extends('adminlte::page')
@section('title', 'from Inventaris')
@section('content_header')
<h1>Data Inventaris</h1>
@stop
@section('content')
{{-- Panggil master data  kategori untuk ditampilkan di element form edit Inventaris --}}
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Horizontal Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @php
    $rs1 = App\Models\Kategori::all();
    @endphp
    @foreach($data as $rs)
    <form class="form-horizontal" method="POST" action="{{ route('inventaris.update',$rs->id) }}">
        @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
        @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit inventaris --}}
        <div class="card-body">
            <div class="form-group row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" value="{{ $rs->nama_barang }}" class="form-control" name="nama_barang" id="nama_barang" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    @foreach($rs1 as $k)
                    @php
                    $cek = ($k->id == $rs->kategori_id) ? 'checked' : '';
                    @endphp
                    <input type="radio" name="kategori_id" value="{{ $k->id }}" {{ $cek }} />&nbsp;{{ $k->nama }} &nbsp;
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Barang</label>
                <div class="col-sm-10">
                    <input type="text" value="{{ $rs->jumlah }}" class="form-control" name="jumlah" id="jumlah" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Barang</label>
                <div class="col-sm-10">
                    <input type="text" value="{{ $rs->harga }}" class="form-control" name="harga" id="harga" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="kondisi" class="col-sm-2 col-form-label">Kondisi Barang</label>
                <div class="col-sm-10">
                    <input type="text" value="{{ $rs->kondisi }}" class="form-control" name="kondisi" id="kondisi" class="form-control">
                </div>
            </div>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Ubah</button>
            <a class="btn btn-info float-right" href="{{ route('inventaris.index')}}" role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>
        </div>
        <!-- /.card-footer -->
    </form>
    @endforeach
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