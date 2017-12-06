<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cycle_id');
            $table->string('description');
            $table->integer('doctor_id')->nullable();
            $table->integer('physiotherapist_id')->nullable();
            $table->foreign('cycle_id')->references('id')->on('cycles');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('physiotherapist_id')->references('id')->on('physiotherapists');
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
        Schema::dropIfExists('diagnosis');
    }
}
