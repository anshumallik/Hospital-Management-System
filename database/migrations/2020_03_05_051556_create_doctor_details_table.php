<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorDetailsTable extends Migration
{

    public function up()
    {
        Schema::create('doctor_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('time_id');
            $table->bigInteger('doctor_id');
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('doctor_details');
    }
}
