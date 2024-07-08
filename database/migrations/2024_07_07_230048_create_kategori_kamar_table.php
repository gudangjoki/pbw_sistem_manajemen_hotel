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
        Schema::create('kategori_kamar', function (Blueprint $table) {
            $table->string('id_tipe_kamar')->primary();
            $table->string('nama_tipe_kamar');
            $table->string('cover')->nullable();
            $table->bigInteger('harga_kamar');
            $table->string('deskripsi');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_kamar');
    }
};
