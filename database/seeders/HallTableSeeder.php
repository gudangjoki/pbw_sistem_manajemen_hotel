<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hall')->insert([
            [
                'nama_ruangan' => 'Aula Utama',
                'jenis_ruangan' => 'Aula',
                'fasilitas' => 'AC, Proyektor, Sound System',
                'harga' => 500000,
                'gambar' => 'img/background.jpg',
                'deskripsi' => 'Aula utama dengan kapasitas 200 orang',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_ruangan' => 'Ruang Rapat A',
                'jenis_ruangan' => 'Ruang Rapat',
                'fasilitas' => 'AC, Proyektor',
                'harga' => 300000,
                'gambar' => 'img/background1.jpg',
                'deskripsi' => 'Ruang rapat dengan kapasitas 50 orang',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_ruangan' => 'Ruang Kelas B',
                'jenis_ruangan' => 'Ruang Kelas',
                'fasilitas' => 'AC, Papan Tulis',
                'harga' => 200000,
                'gambar' => 'img/background2.jpg',
                'deskripsi' => 'Ruang kelas dengan kapasitas 30 orang',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
