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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('instansi_pengirim');
            $table->date('tanggal_surat');
            $table->date('tanggal_diterima');
            $table->string('nomor_agenda')->nullable();
            $table->foreignId('klasifikasi_id')->constrained(
                table: 'klasifikasis',
                indexName: 'surat_masuk_klasifikasi_id'
            );
            $table->foreignId('status_id')->constrained(
                table: 'statuses',
                indexName: 'surat_masuk_status_id'
            );
            $table->foreignId('sifat_id')->constrained(
                table: 'sifats',
                indexName: 'surat_masuk_sifat_id'
            );
            $table->string('lampiran')->nullable();
            $table->string('file_patch')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
