<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_password_resets', function (Blueprint $table) {
            $table->id('res_id'); // Primary key

            $table->unsignedBigInteger('res_user_id'); // Foreign key ke users
            $table->string('res_token', 255)->unique(); // Token reset
            $table->timestamp('res_created_at')->useCurrent(); // waktu dibuat
            $table->boolean('res_used')->default(false); // status sudah digunakan atau belum

            // Foreign key constraint
            $table->foreign('res_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_password_resets');
    }
};
