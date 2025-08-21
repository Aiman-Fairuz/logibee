<?php
// database/migrations/2025_08_21_000002_create_transaction_items_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id('trx_item_id');
            $table->unsignedBigInteger('trx_id');
            $table->unsignedBigInteger('prd_id');
            $table->integer('quantity');
            $table->decimal('subtotal', 12, 2);

            $table->foreign('trx_id')->references('trx_id')->on('transactions')->onDelete('cascade');
            $table->foreign('prd_id')->references('prd_id')->on('tb_products')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('transaction_items');
    }
};
