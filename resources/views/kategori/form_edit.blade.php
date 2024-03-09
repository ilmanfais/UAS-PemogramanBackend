@extends('adminlte::page')
@section('title', 'From Kategori')
@section('content_header')
<h1>Data Kategori</h1>
@stop
@section('content')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Edit Kategori</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach($data as $rs)
    <form class="form-horizontal" method="POST" action="{{ route('kategori.update',$rs->id) }}">
        @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
        @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit kategori --}}
        <div class="card-body">
        <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $rs->nama }}" class="form-control" name="nama" id="nama" class="form-control">
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
            <a class="btn btn-info float-right" href="{{ route('kategori.index')}}" role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>
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