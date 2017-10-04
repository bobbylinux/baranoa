<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessesTherapiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses_therapies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_id');
            $table->integer('therapy_id');
            $table->timestamps();
            /*foreign keys*/
            $table->foreign('access_id')->references('id')->on('accesses');
            $table->foreign('therapy_id')->references('id')->on('therapies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesses_terapies');
    }
}
