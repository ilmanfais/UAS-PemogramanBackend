<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

use App\Exports\GedungExport;
use Maatwebsite\Excel\Facades\Excel;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data dari tabel gedung, diurutkan berdasarkan id
        $ar_gedung = DB::table('gedung')
            ->join('inventaris', 'inventaris.id', '=', 'gedung.inventaris_id')
            ->join('kategori', 'kategori.id', '=', 'gedung.inventaris_kategori_id')
            ->select(
                'gedung.*',
                'inventaris.nama_barang as inventaris_id',
                'kategori.nama as inventaris_kategori_id'
            )
            ->orderBy('gedung.id')
            ->get();
    
        return view('gedung.index', compact('ar_gedung'));
    }
    

public function gedungcsv()
    {
        return Excel::download(new GedungExport, 'gedung.xlsx');
    }
public function gedungPDF()
{
    $ar_gedung = DB::table('gedung')
        ->join('inventaris', 'inventaris.id', '=', 'gedung.inventaris_id')
        ->join('kategori', 'kategori.id', '=', 'gedung.inventaris_kategori_id')
        ->select(
            'gedung.*',
            'inventaris.nama_barang as inventaris_id',
            'kategori.nama as inventaris_kategori_id'
        )
        ->get();
        $pdf = PDF::loadView('gedung.gedungPDF',['ar_gedung'=>$ar_gedung]);
        return $pdf->download('datagedung.pdf');
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Membuat Form Inputan
        return view('gedung.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Menyimpan Data ke tabel gedung

        $validasi = $request->validate([
            'nama' => 'required|max:255',
            'inventaris_kategori_id' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'inventaris_id' => 'required|numeric',
        ], [
            'nama.required' => 'Nama Gedung Wajib di Isi',
            'nama.max' => 'Nama Gedung Tidak Boleh Lebih dari 255 Karakter',
            'inventaris_kategori_id.required' => 'ID Kategori Wajib di Isi',
            'inventaris_kategori_id.numeric' => 'ID Kategori Harus Berupa Angka',
            'jumlah.required' => 'Jumlah Gedung Wajib di Isi',
            'jumlah.numeric' => 'Jumlah Gedung Harus Berupa Angka',
            'inventaris_id.required' => 'ID Inventaris Wajib di Isi',
            'inventaris_id.numeric' => 'ID Inventaris Harus Berupa Angka',
        ]);

        DB::table('gedung')->insert([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'inventaris_id' => $request->inventaris_id,
            'inventaris_kategori_id' => $request->inventaris_kategori_id
            ]
            );
            // redirect
            return redirect('/gedung');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan data dari tabel gedung
        $ar_gedung = DB::table('gedung')
            ->join('inventaris', 'inventaris.id', '=', 'gedung.inventaris_id')
            ->join('kategori', 'kategori.id', '=', 'gedung.inventaris_kategori_id')
            ->select(
                'gedung.*',
                'inventaris.nama_barang as inventaris_id',
                'kategori.nama as inventaris_kategori_id'
            )->where('gedung.id', '=', $id)->get();
        return view('gedung.show', compact('ar_gedung'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Membuat Form eDit Inputan
        $data = DB::table('gedung')
            ->where('id', '=', $id)->get();
        return view('gedung.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update Data ke tabel gedung
        DB::table('gedung')->where('id', $id)->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'inventaris_id' => $request->inventaris_id,
            'inventaris_kategori_id' => $request->inventaris_kategori_id
        ]);
        // redirect
        return redirect('/gedung');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus Data dari tabel gedung
        DB::table('gedung')->where('id', $id)->delete();
        // redirect
        return redirect('/gedung');
    }
}
