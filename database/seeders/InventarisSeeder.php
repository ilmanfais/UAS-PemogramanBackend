<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventaris')->insert([
            [
                'nama_barang' => 'Kursi',
                'kategori_id' => 1,
                'jumlah' => 10,
                'harga' => 100000,
                'kondisi' => 'Baik'
            ],
            [
                'nama_barang' => 'Meja',
                'kategori_id' => 2,
                'jumlah' => 5,
                'harga' => 50000,
                'kondisi' => 'Baik'
            ],
            [
                'nama_barang' => 'Lemari',
                'kategori_id' => 3,
                'jumlah' => 2,
                'harga' => 200000,
                'kondisi' => 'Rusak'
            ]
        ]);
    }
}
