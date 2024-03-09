<?php

namespace App\Exports;

use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; 
use DB;

class KategoriExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_kategori = DB::table('kategori')
            ->select(
                'kategori.*',
            )->get();
        return $ar_kategori;
    }

    public function headings(): array
    {
        return [
        'No', 'Nama '
        ];
    }
}
