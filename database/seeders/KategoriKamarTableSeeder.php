<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriKamarTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategori_kamar')->insert([
            [
                'id_tipe_kamar' => 'STD',
                'nama_tipe_kamar' => 'Standard Room',
                'harga_kamar' => 100000,
                'deskripsi' => 'Standard room with basic facilities',
            ],
            [
                'id_tipe_kamar' => 'DLX',
                'nama_tipe_kamar' => 'Deluxe Room',
                'harga_kamar' => 200000,
                'deskripsi' => 'Deluxe room with additional facilities',
            ],
        ]);
    }
}