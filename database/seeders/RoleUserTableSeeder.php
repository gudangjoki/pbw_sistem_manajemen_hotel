<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('role_user')->insert([
            [
                'username' => 'admin',
                'role_id' => 1,
            ],
        ]);
    }
}