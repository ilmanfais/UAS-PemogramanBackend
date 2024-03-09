@extends('adminlte::page')
@section('title', 'Detail Kategori Barang')
@section('content_header')
<h1>Kategori Barang</h1>
@stop
@section('content')
@foreach($ar_kategori as $k)
<div class="media">
  <div class="media-body">
    <h3><u>{{ $k->nama }}</u></h3>
    <hr /><a href="{{ url('/kategori') }}" class="btn btn-primary">Go Back</a>
  </div>
</div>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop