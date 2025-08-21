<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'rol_id'     => 1,
                'rol_name'   => 'Staff',
                'rol_note'   => 'Admin dengan akses penuh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rol_id'     => 2,
                'rol_name'   => 'Kasir',
                'rol_note'   => 'Kasir dengan akses terbatas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
