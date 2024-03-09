@extends('adminlte::page')
@section('title', 'From Edit Gedung')
@section('content_header')
<h1>Data Gedung</h1>
@stop
@section('content')
{{-- Panggil master data  kategori untuk ditampilkan di element form edit Gedung --}}
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Horizontal Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @php
    $rs1 = App\Models\Inventaris::all();
    $rs2 = App\Models\Kategori::all();
    @endphp
    @foreach($data as $rs)
    <form class="form-horizontal" method="POST" action="{{ route('gedung.update',$rs->id) }}">
        @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
        @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit gedung --}}
        <div class="card-body">
        <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $rs->nama }}" class="form-control" name="nama" id="nama" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $rs->jumlah }}" class="form-control" name="jumlah" id="jumlah">
        </div>
      </div>
      <div class="form-group row">
        <label for="inventaris_id" class="col-sm-2 col-form-label">Nama Barang</label>
        <div class="col-sm-10">
          <select class="form-control" name="inventaris_id">
            <option value="">-- Pilih Nama Barang --</option>
            @foreach($rs1 as $i)
            @php
            $sel1 = ($i->id == $rs->inventaris_id) ? 'selected' : '';
            @endphp
            <option value="{{ $i->id }}" {{ $sel1 }}>{{ $i->nama_barang }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inventaris_kategori-id" class="col-sm-2 col-form-label">Kategori Barang</label>
        <div class="col-sm-10">
          <select class="form-control" name="inventaris_kategori_id">
            <option value="">-- Pilih Kategori Barang --</option>
            @foreach($rs2 as $i)
            @php
            $sel2 = ($i->id == $rs->inventaris_kategori_id) ? 'selected' : '';
            @endphp
            <option value="{{ $i->id }}" {{ $sel2 }}>{{ $i->nama }}</option>
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
            <button type="submit" class="btn btn-info">Ubah</button>
            <a class="btn btn-info float-right" href="{{ route('gedung.index')}}" role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>
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