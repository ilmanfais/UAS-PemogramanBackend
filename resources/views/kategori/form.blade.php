@extends('adminlte::page')
@section('title', 'From Kategori')
@section('content_header')
<h1>From Kategori</h1>
@stop
@section('content')
<!-- Horizontal Form -->
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-book"></i></h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" action="{{ route('kategori.store')}}">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" id="nama" class="form-control">
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
      <a class="btn btn-info float-right" href="{{ route('kategori.index')}}" role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop