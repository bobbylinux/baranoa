<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessesTerapiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accesses_terapies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_id');
            $table->integer('terapy_id');
            $table->timestamps();
            /*foreign keys*/
            $table->foreign('access_id')->references('id')->on('accesses');
            $table->foreign('terapy_id')->references('id')->on('terapies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accesses_terapies', function (Blueprint $table) {
            Schema::dropIfExists('accesses_terapies');
        });
    }
}
