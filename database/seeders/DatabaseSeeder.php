<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Users;
use Database\Seeders\products;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

            DB::table('users')->insert([
            'id' => 1,
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'usr_role_id' => 1, // Assuming role ID 1 exists
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);  

        DB::table('roles')->insert([
                'rol_id'     => 1,
                'rol_name'   => 'Staff',
                'rol_note'   => 'Admin dengan akses penuh',
                'created_at' => now(),
                'updated_at' => now(),
        ]);  



        // Seeder tb_products
        DB::table('tb_products')->insert([
                'prd_id' => 1,            
                'prd_name' => 'Buku Pemrograman Laravel',
                'prd_description' => 'Panduan lengkap Laravel 10',
                'prd_price' => 75000,
                'prd_stock' => 50,
                'prd_create_by' => 1,
                'prd_created_at' => now()
        ]);

        // Seeder tb_transactions
        DB::table('tb_transactions')->insert([
                'trx_id' => 1,
                'trx_user_id' => 1,
                'trx_total_amount' => 425000,
                'trx_transaction_at' => now(),
                'trx_note' => 'Pembelian buku & keyboard'
        ]);

        // Seeder tb_transaction_items
        DB::table('tb_transaction_items')->insert([
                'tri_id' => 1,
                'tri_trx_id' => 1,
                'tri_prd_id' => 1,
                'tri_quantity' => 1,
                'tri_subtotal' => 75000
        ]);

        // Seeder tb_store_settings
        DB::table('tb_store_settings')->insert([
            'set_store_name' => 'UNIBOOKSTORE',
            'set_address' => 'Jl. Pendidikan No. 1, Jakarta',
            'set_logo_url' => 'logo.png',
            'set_updated_at' => now()
        ]);

        // Seeder tb_password_resets
        DB::table('tb_password_resets')->insert([
            'res_user_id' => 1,
            'res_token' => bin2hex(random_bytes(16)),
            'res_created_at' => now(),
            'res_used' => false
        ]);

        
    }
}
