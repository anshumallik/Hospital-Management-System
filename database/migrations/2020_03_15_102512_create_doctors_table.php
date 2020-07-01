<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{

    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation_id');
            $table->string('day');
            $table->string('time');
            $table->string('name');
            $table->string('image');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('fee');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
