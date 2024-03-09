@extends('adminlte::page')
@section('title', 'From Gedung')
@section('content_header')
<h1>From Gedung</h1>
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
  $rs2 = App\Models\Inventaris::all();
  @endphp
  <form class="form-horizontal" method="post" action="{{ route('gedung.store')}}">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" id="nama" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="jumlah" id="jumlah">
        </div>
      </div>
      <div class="form-group row">
        <label for="inventaris_id" class="col-sm-2 col-form-label">Nama Barang</label>
        <div class="col-sm-10">
          <select class="form-control" name="inventaris_id">
            <option value="">-- Pilih Nama Barang --</option>
            @foreach($rs2 as $i)
            <option value="{{ $i->id }}">{{ $i->nama_barang }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inventaris_kategori-id" class="col-sm-2 col-form-label">Kategori Barang</label>
        <div class="col-sm-10">
          <select class="form-control" name="inventaris_kategori_id">
            <option value="">-- Pilih Kategori Barang --</option>
            @foreach($rs1 as $i)
            <option value="{{ $i->id }}">{{ $i->nama }}</option>
            @endforeach
          </select>
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
      <a class="btn btn-info float-right" href="{{ route('gedung.index')}}" role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop