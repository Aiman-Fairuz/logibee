<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
    'name' => 'Admin Cashmate',
    'email' => 'admin@cashmate.com',
    'password' => Hash::make($defaultPassword),
    'usr_role_id' => 1,
    'created_at' => now(),
    'updated_at' => now(),
]);


        $this->command->info('Semua password user sudah diperbarui ke Bcrypt!');
    }
    
}
