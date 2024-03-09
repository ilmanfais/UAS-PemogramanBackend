<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gedung')->insert([
            [
                'nama' => 'Gedung 1',
                'jumlah' => 10,
                'inventaris_id' => 1,
                'inventaris_kategori_id' => 1
            ],
            [
                'nama' => 'Gedung 2',
                'jumlah' => 5,
                'inventaris_id' => 2,
                'inventaris_kategori_id' => 2
            ],
            [
                'nama' => 'Gedung 3',
                'jumlah' => 2,
                'inventaris_id' => 3,
                'inventaris_kategori_id' => 2
            ]
        ]);
    }
}
