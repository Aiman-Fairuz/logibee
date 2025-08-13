<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_store_settings', function (Blueprint $table) {
            $table->id('set_id'); // PK, auto increment

            $table->string('set_store_name', 255); // required
            $table->text('set_address')->nullable(); // nullable
            $table->string('set_logo_url', 255)->nullable(); // nullable

            $table->timestamp('set_updated_at')->nullable()->useCurrentOnUpdate(); // auto generated
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_store_settings');
    }
};

