<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingHallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_hall', function (Blueprint $table) {
            $table->bigIncrements('id_booking_hall')->unsigned();
            $table->integer('username');
            $table->date('tgl');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps(); // This will add `created_at` and `updated_at`
            $table->bigInteger('id_hall')->unsigned();
            $table->bigInteger('id_snack')->unsigned();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_hall');
    }
}
