@php
$ar_judul = ['No', 'Nama Barang', 'Kategori', 'Jumlah', 'Harga', 'Kondisi'];
$no = 1;
@endphp

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Inventaris Barang</h3>
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
                @foreach($ar_inventaris as $i)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $i->nama_barang }}</td>
                    <td>{{ $i->kategori_id }}</td>
                    <td>{{ $i->jumlah }}</td>
                    <td>{{ $i->harga }}</td>
                    <td>{{ $i->kondisi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>