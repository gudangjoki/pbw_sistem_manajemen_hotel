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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id('id_kamar');
            $table->string('nomor_kamar');
            $table->string('id_tipe_kamar');
            $table->boolean('status_kamar');
            $table->timestamps();

            // $table->foreign('id_tipe_kamar')->references('id_tipe_kamar')->on('kategori_kamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
