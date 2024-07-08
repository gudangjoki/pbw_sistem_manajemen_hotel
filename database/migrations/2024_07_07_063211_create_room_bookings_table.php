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
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->uuid('id_booking_room')->primary();
            $table->string('username');
            $table->bigInteger('id_kamar')->unsigned()->nullable();
            $table->string('id_tipe_kamar');
            $table->enum('status', ['pending', 'confirmed', 'checked_in', 'checked_out', 'cancelled'])->default('pending');
            $table->integer('harga_kamar')->nullable();
            $table->date('check_in');
            $table->date('check_out');
            // $table->string('verified_by');

            $table->foreign('username')->references('username')->on('users');
            $table->foreign('id_kamar')->references('id_kamar')->on('kamar');

                        // $table->foreign('verified_by')->references('username')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_bookings');
    }
};
