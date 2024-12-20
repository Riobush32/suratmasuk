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
        Schema::create('catatan_surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_keluar_id')->constrained(
                table: 'surat_keluars',
                indexName: 'catatan_surat_keluar_id'
            );
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'catatan_keluar_user_id'
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
        Schema::dropIfExists('catatan_surat_keluars');
    }
};
