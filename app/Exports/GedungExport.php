<?php

namespace App\Exports;

use App\Models\Gedung;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; 
use DB;

class GedungExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_gedung = DB::table('gedung')
            ->join('inventaris', 'inventaris.id', '=', 'gedung.inventaris_id')
            ->join('kategori', 'kategori.id', '=', 'gedung.inventaris_kategori_id')
            ->select(
                'gedung.*',
                'inventaris.nama_barang as inventaris_id',
                'kategori.nama as inventaris_kategori_id'
            )->get();
        return $ar_gedung;
    }
    public function headings(): array
    {
        return [
        'No' ,'Nama Gedung', 'Jumlah', 'Nama Barang', 'Kategori Barang' 
        ];
    }
}
