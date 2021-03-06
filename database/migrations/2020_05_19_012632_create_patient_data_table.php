<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('width');
            $table->integer('height');
            $table->string('blood');
            $table->string('agree_name')->nullable();
            $table->string('allergi_data')->nullable();
            // $table->string('severity')->nullable();
            // $table->string('reaction')->nullable();
            $table->string('surgery_data')->nullable();
            $table->string('medication_name')->nullable();
            $table->string('rocata_file')->nullable();
            $table->string('rays_file')->nullable();
            $table->string('analzes_file')->nullable();
            $table->integer('colonscopy')->default(2)->nullable();
            $table->date('colonscopy_data')->nullable();
            $table->integer('mammogram')->default(4)->nullable();
            $table->date('mammogram_data')->nullable();
            $table->integer('prc')->default(6)->nullable();
            $table->date('prc_data')->nullable();
            $table->string('alcohol_type')->nullable();
            $table->string('alcohol_severity')->nullable();
            $table->string('cigarettes')->nullable();
            $table->string('tobacco')->nullable();
            $table->string('drug')->nullable();
            $table->string('mother')->nullable();
            $table->string('other_mother')->nullable();
            $table->string('father')->nullable();
            $table->string('other_father')->nullable();
            $table->string('sister')->nullable();
            $table->string('other_sister')->nullable();
            $table->string('brother')->nullable();
            $table->string('other_brother')->nullable();
            $table->string('grnadmaM')->nullable();
            $table->string('other_grnadmaM')->nullable();
            $table->string('grandmaF')->nullable();
            $table->string('other_grandmaF')->nullable();
            $table->string('grnadpaM')->nullable();
            $table->string('other_grnadpaM')->nullable();
            $table->string('grnadpaF')->nullable();
            $table->string('other_grnadpaF')->nullable();
            $table->string('wife_Period_Cycle')->nullable();
            $table->string('wife_Abotion')->nullable();
            $table->string('wife_Contraceptive')->nullable();
            $table->string('mother_Period_Cycle')->nullable();
            $table->string('mother_pregnency')->nullable();
            $table->string('mother_abotion')->nullable();
            $table->string('mother_deliveries')->nullable();
            $table->string('mother_complicetion')->nullable();
            $table->string('mother_Contraceptive')->nullable();
            $table->string('single_Period_Cycle')->nullable();
            $table->boolean('online')->default(0);
            $table->bigInteger('patient_id')->unsigned();
            // foreign key //
            $table->foreign('patient_id')->references('id')->on('patiens')->onDelete('cascade');

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
        Schema::dropIfExists('patient_data');
    }
}
