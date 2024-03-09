@php
$ar_judul = ['No', 'Nama', 'Jumlah', 'Nama Barang', 'Kategori Barang'];
$no = 1;
@endphp

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Gedung</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table border="1" width="100%" cellspacing="0" align="center">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>