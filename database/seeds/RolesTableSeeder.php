<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('roles')->insert([
            ['role_name' => 'Admin', 'description' => 'Memiliki akses penuh untuk mengelola sistem dan data', 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'User', 'description' => 'Pengguna reguler yang dapat melakukan pemesanan', 'created_at' => now(), 'updated_at' => now()],
            ['role_name' => 'Editor', 'description' => 'Bertanggung jawab untuk mengelola konten berita dan informasi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
