<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingHallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_hall')->insert([
            [
                'username' => 1,
                'tgl' => '2024-07-01',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_hall' => 1,
                'id_snack' => 1,
                'status' => 1
            ],
            [
                'username' => 2,
                'tgl' => '2024-07-02',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '12:00:00',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_hall' => 2,
                'id_snack' => 2,
                'status' => 1
            ]
        ]);
    }
}
