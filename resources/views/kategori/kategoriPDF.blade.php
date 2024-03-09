@php
$ar_judul = ['No', 'Nama'];
$no = 1;
@endphp

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kategori Barang</h3>
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
                @foreach($ar_kategori as $k)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $k->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>