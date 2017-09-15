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
        Schema::table('accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->integer('physiontherapist_id');
            $table->integer('terapy_id');
            $table->string('note',4000)->nullable();
            $table->boolean('enabled')->default(true);
            $table->integer('cycle_id');
            $table->timestamps();
            /*foreign keys*/
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('physiontherapist_id')->references('id')->on('physiontherapists');
            $table->foreign('terapy_id')->references('id')->on('terapies');
            $table->foreign('cicle_id')->references('id')->on('cicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accesses', function (Blueprint $table) {
            Schema::dropIfExists('accesses');
        });
    }
}
