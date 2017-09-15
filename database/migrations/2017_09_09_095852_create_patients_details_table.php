<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('address',255);
            $table->integer('city_id');
            $table->string('phone_numbers',255)->nullable();
            $table->string('email',255)->nullable();
            $table->date('start_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('end_date')->nullable();
            $table->timestamps();
            /*foreign keys*/
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients_details', function (Blueprint $table) {
            Schema::dropIfExists('patients_details');
        });
    }
}
