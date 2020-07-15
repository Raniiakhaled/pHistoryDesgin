<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('phoneNumber');
            $table->string('password');
            $table->string('Primary_Speciality');
            $table->string('degree');
            $table->text('information');
            $table->string('national_id_front_side');
            $table->string('national_id_back_side');
            $table->string('national_id');
            $table->string('branch');
            $table->string('Nationality');
            $table->bigInteger('hosptail_id')->unsigned()->nullable();
            $table->bigInteger('clinic_id')->unsigned()->nullable();

            $table->foreign('hosptail_id')->references('id')->on('hosptails')->onDelete('cascade');
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
