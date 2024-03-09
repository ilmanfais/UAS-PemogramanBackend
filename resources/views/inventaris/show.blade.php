@extends('adminlte::page')
@section('title', 'Detail Inventaris Barang')
@section('content_header')
<h1>Inventaris Barang</h1>
@stop
@section('content')
@foreach($ar_inventaris as $i)
<div class="media">
  <div class="media-body">
    <h3><u>{{ $i->nama_barang }}</u></h3>
    <p>
      <br />Kategori Barang: {{ $i->kategori_id }} 
      <br />Jumlah {{ $i->jumlah }}
      <br />Harga: {{ $i->harga }}
      <br />Kondisi: {{ $i->kondisi }} 
    </p>
    <hr /><a href="{{ url('/inventaris') }}" class="btn btn-primary">Go Back</a>
  </div>
</div>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop