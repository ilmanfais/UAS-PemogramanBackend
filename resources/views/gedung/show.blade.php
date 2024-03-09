@extends('adminlte::page')
@section('title', 'Detail Gedung')
@section('content_header')
<h1>Gedung</h1>
@stop
@section('content')
@foreach($ar_gedung as $g)
<div class="media">
  <div class="media-body">
    <h3><u>{{ $g->nama }}</u></h3>
    <p>
      <br />Jumlah {{ $g->jumlah }}
      <br />Nama Barang: {{ $g->inventaris_id }}
      <br />Kategori Barang: {{ $g->inventaris_kategori_id }} 
    </p>
    <hr /><a href="{{ url('/gedung') }}" class="btn btn-primary">Go Back</a>
  </div>
</div>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop