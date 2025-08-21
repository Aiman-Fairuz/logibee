<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_transactions', function (Blueprint $table) {
            $table->id('trx_id'); // bigint auto_increment primary key

            $table->unsignedBigInteger('trx_user_id'); // FK ke users
            $table->decimal('trx_total_amount', 12, 2); // total_amount
            $table->timestamp('trx_transaction_at')->useCurrent(); // waktu transaksi
            $table->text('trx_note')->nullable(); // catatan transaksi

            // Foreign key ke tabel users
            $table->foreign('trx_user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
