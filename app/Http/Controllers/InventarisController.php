<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

use App\Exports\InventarisExport;
use Maatwebsite\Excel\Facades\Excel;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data dari tabel inventaris
        $ar_inventaris = DB::table('inventaris')
            ->join('kategori', 'kategori.id', '=', 'inventaris.kategori_id')
            ->select(
                'inventaris.*',
                'kategori.nama as kategori_id'
            )->get();
        return view('inventaris.index', compact('ar_inventaris'));
    }

    public function inventariscsv()
    {
        return Excel::download(new InventarisExport, 'inventaris.xlsx');
    }

    public function inventarisPDF()
    {
        $ar_inventaris = DB::table('inventaris')
            ->join('kategori', 'kategori.id', '=', 'inventaris.kategori_id')
            ->select(
                'inventaris.*',
                'kategori.nama as kategori_id'
            )->get();
            $pdf = PDF::loadView('inventaris.inventarisPDF',['ar_inventaris'=>$ar_inventaris]);
            return $pdf->download('datainventaris.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Membuat Form Inputan
        return view('inventaris.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Menyimpan Data ke tabel inventaris

        $validasi = $request->validate([
            'nama_barang' => 'required|max:255',
            'kategori_id' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'kondisi' => 'required|max:255',
        ], [
            'nama_barang.required' => 'Nama Barang Wajib di Isi',
            'nama_barang.max' => 'Nama Barang Tidak Boleh Lebih dari 255 Karakter',
            'kategori_id.required' => 'ID Kategori Wajib di Isi',
            'kategori_id.numeric' => 'ID Kategori Harus Berupa Angka',
            'jumlah.required' => 'Jumlah Barang Wajib di Isi',
            'jumlah.numeric' => 'Jumlah Barang Harus Berupa Angka',
            'harga.required' => 'Harga Barang Wajib di Isi',
            'harga.numeric' => 'Harga Barang Harus Berupa Angka',
            'kondisi.required' => 'Kondisi Barang Wajib di Isi',
            'kondisi.max' => 'Kondisi Barang Tidak Boleh Lebih dari 255 Karakter',
        ]);

        // Menggunakan Query Builder Laravel
        DB::table('inventaris')->insert(
            [
                'nama_barang' => $request->nama_barang,
                'kategori_id' => $request->kategori_id,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'kondisi' => $request->kondisi,
            ]
        );
        // landing page
        return redirect('/inventaris');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan data dari tabel inventaris
        $ar_inventaris = DB::table('inventaris')
            ->join('kategori', 'kategori.id', '=', 'inventaris.kategori_id')
            ->select('inventaris.*', 'kategori.nama as kategori_id')
            ->where('inventaris.id', '=', $id)->get();
        return view('inventaris.show', compact('ar_inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Membuat Form Inputan
        $data = DB::table('inventaris')
            ->where('id', '=', $id)->get();
        return view('inventaris.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Menyimpan Data ke tabel inventaris
        DB::table('inventaris')->where('id', '=', $id)->update(
            [
                'nama_barang' => $request->nama_barang,
                'kategori_id' => $request->kategori_id,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'kondisi' => $request->kondisi,
            ]
        );
        return redirect('/inventaris');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // menghapus data
        DB::table('inventaris')->where('id', $id)->delete();
        return redirect('/inventaris');
    }
}
