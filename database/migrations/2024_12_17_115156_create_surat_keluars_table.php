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
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            $table->foreignId('sifat_id')->constrained(
                table: 'sifats',
                indexName: 'surat_keluar_sifat_id'
            );
            $table->foreignId('status_id')->constrained(
                table: 'statuses',
                indexName: 'surat_keluar_status_id'
            );
            $table->foreignId('klasifikasi_id')->constrained(
                table: 'klasifikasis',
                indexName: 'surat_keluar_klasifikasi_id'
            );
            $table->string('judul_surat')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('perihal')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('tujuan')->nullable();
            $table->text('isi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
