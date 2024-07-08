<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kamar')->insert([
            [
                'nomor_kamar' => '101',
                'id_tipe_kamar' => 'STD',
                'status_kamar' => 1,
            ],
            [
                'nomor_kamar' => '102',
                'id_tipe_kamar' => 'DLX',
                'status_kamar' => 1,
            ],
        ]);
    }
}