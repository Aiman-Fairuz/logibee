<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_transaction_items', function (Blueprint $table) {
            $table->id('tri_id'); // Primary Key, auto_increment

            $table->unsignedBigInteger('tri_trx_id'); // FK ke tb_transactions
            $table->unsignedBigInteger('tri_prd_id'); // FK ke tb_products

            $table->integer('tri_quantity'); // jumlah barang
            $table->decimal('tri_subtotal', 12, 2); // subtotal = quantity * price

            // Foreign keys
            $table->foreign('tri_trx_id')->references('trx_id')->on('tb_transactions')->onDelete('cascade');
            $table->foreign('tri_prd_id')->references('prd_id')->on('tb_products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_transaction_items');
    }
};
