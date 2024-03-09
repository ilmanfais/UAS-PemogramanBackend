<?php

namespace App\Exports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; 
use DB;

class InventarisExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_inventaris = DB::table('inventaris')
            ->join('kategori', 'kategori.id', '=', 'inventaris.kategori_id')
            ->select(
                'inventaris.*',
                'kategori.nama as kategori_id'
            )->get();
        return $ar_inventaris;
    }
    public function headings(): array
    {
        return [
        'No', 'Nama Barang', 'Kategori', 'Jumlah', 'Harga', 'Kondisi' 
        ];
    }
}
