@extends('adminlte::page')
@section('title', 'Inventaris Barang')
@section('content_header')
<h1>Inventaris Barang</h1>
@stop
@section('content')
<!-- Horizontal Form -->
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-book"></i></h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  @php
  $rs1 = App\Models\Kategori::all();
  @endphp
  <form class="form-horizontal" method="post" action="{{ route('inventaris.store')}}">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama_barang" id="nama_barang" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
          @foreach($rs1 as $k)
          <input type="radio" name="kategori_id" value="{{ $k->id }}" /> &nbsp; {{ $k->nama }} &nbsp; &nbsp;
          @endforeach
        </div>
      </div>
      <div class="form-group row">
        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Barang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="jumlah" id="jumlah" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="harga" class="col-sm-2 col-form-label">Harga Barang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="harga" id="harga" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="kondisi" class="col-sm-2 col-form-label">Kondisi Barang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="kondisi" id="kondisi" class="form-control">
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
      <button type="submit" class="btn btn-info">Submit</button>
      <a class="btn btn-info float-right" href="{{ route('inventaris.index')}}" role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop