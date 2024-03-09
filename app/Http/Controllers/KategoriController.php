<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

use App\Exports\KategoriExport;
use Maatwebsite\Excel\Facades\Excel;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data dari tabel kategori
        $ar_kategori = DB::table('kategori')
            ->select(
                'kategori.*'
            )->get();
        return view('kategori.index', compact('ar_kategori'));
    }

    public function kategoricsv()
    {
        return Excel::download(new KategoriExport, 'kategori.xlsx');
    }


    public function kategoriPDF()
    {
        $ar_kategori = DB::table('kategori')
            ->select(
                'kategori.*',
            )->get();
            $pdf = PDF::loadView('kategori.kategoriPDF',['ar_kategori'=>$ar_kategori]);
            return $pdf->download('datakategori.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Membuat Form Inputan
        return view('kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Menyimpan Data ke tabel kategori
        $validasi = $request->validate([
            'nama' => 'required|max:255',
        ], [
            'nama.required' => 'Nama Kategori Wajib di Isi',
            'nama.max' => 'Nama Kategori Tidak Boleh Lebih dari 255 Karakter',
        ]);
        
        DB::table('kategori')->insert(
            [
                'nama' => $request->nama,
            ]
        );
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan data dari tabel kategori
        $ar_kategori = DB::table('kategori')
            ->select('kategori.*')
            ->where('kategori.id', '=', $id)->get();
        return view('kategori.show', compact('ar_kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengedit Data dari tabel kategori
        $data = DB::table('kategori')
            ->where('id', '=', $id)->get();
        return view('kategori.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Menyimpan Data ke tabel kategori

        DB::table('kategori')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama,
            ]
        );
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus Data dari tabel kategori
        DB::table('kategori')->where('id', '=', $id)->delete();
        return redirect('/kategori');
    }
}
