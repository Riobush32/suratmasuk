<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('catatan_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_masuk_id')->constrained(
                table: 'surat_masuks',
                indexName: 'catatan_masuk_surat_masuk_id'
            );
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'catatan_masuk_user_id'
            );
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_masuks');
    }
};
