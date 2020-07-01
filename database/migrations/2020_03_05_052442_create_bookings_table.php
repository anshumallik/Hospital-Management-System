<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{

    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('designation_name');
            $table->string('doctor_name');
            $table->string('doctor_day');
            $table->string('doctor_time');
            $table->string('doctor_fees');
            $table->string('status');
            $table->date('booking_date');
            $table->string('time_choosen');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
