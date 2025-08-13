<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_products', function (Blueprint $table) {
            $table->id('prd_id'); // bigint auto_increment primary key
            $table->string('prd_name', 255);
            $table->text('prd_description')->nullable();
            $table->decimal('prd_price', 12, 2);
            $table->integer('prd_stock');

            $table->unsignedBigInteger('prd_create_by');
            $table->unsignedBigInteger('prd_update_by')->nullable();
            $table->unsignedBigInteger('prd_delete_by')->nullable();

            $table->timestamp('prd_created_at')->useCurrent();
            $table->timestamp('prd_updated_at')->nullable();
            $table->timestamp('prd_deleted_at')->nullable();

            $table->string('prd_sys_note', 255)->nullable();

            // Foreign keys ke tabel users
            $table->foreign('prd_create_by')->references('id')->on('users');
            $table->foreign('prd_update_by')->references('id')->on('users');
            $table->foreign('prd_delete_by')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_products');
    }
};
