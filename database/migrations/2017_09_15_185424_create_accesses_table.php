<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->integer('physiotherapist_id');
            $table->string('note', 4000)->nullable();
            $table->boolean('enabled')->default(true);
            $table->integer('cycle_id');
            $table->timestamps();
            /*foreign keys*/
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('physiotherapist_id')->references('id')->on('physiotherapists');
            $table->foreign('cycle_id')->references('id')->on('cycles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesses');
    }
}
