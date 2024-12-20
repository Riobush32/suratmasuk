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
        Schema::create('sifats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('color_list_id')->constrained(
                table: 'color_lists',
                indexName: 'sifat_color_list_id'
            );
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sifats');
    }
};
