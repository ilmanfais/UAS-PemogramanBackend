@extends('adminlte::page')
@section('title', 'Gedung')
@section('content_header')
<h1>Gedung</h1>
@stop
@section('content')
@php
$ar_judul = ['No', 'Nama', 'Jumlah', 'Nama Barang', 'Kategori Barang', 'Action'];
$no = 1;
@endphp
@if(Auth::user()->role != 'anggota')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Gedung</h3>
        <br><br>
        <a class="btn btn-primary" href="{{ route('gedung.create') }}" role="button">
            <i class="fa fa-plus"></i> Tambah gedung
        </a>
        <a href="{{ url('gedungpdf') }}" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>
        <a class="btn btn-primary" href="{{ url('gedungcsv') }}" role="button">
            <i class="fas fa-file-excel"></i> Export Excel
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    @foreach($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($ar_gedung as $g)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $g->nama }}</td>
                    <td>{{ $g->jumlah }}</td>
                    <td>{{ $g->inventaris_id }}</td>
                    <td>{{ $g->inventaris_kategori_id }}</td>
                    <td>
                        <form method="POST" action="{{ route('gedung.destroy', $g->id) }}">
                            @csrf {{--security untuk menghindari dari serangan pada saat input form--}}
                            @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                            <a class="btn btn-info" href="{{ route('gedung.show', $g->id) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-success" href="{{ route('gedung.edit', $g->id) }}"><i class="fa fa-pen"></i></a>
                            <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data diHapus?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@else
    @include('layouts.accessDenied')
@endif
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop
@section('js')
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- <script>
    console.log('Hi!');
</script> -->

@stop