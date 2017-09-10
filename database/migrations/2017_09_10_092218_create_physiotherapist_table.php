<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysiotherapistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('physiotherapist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_name',255);
            $table->string('first_name',255);
            $table->boolean('enabled')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('physiotherapist', function (Blueprint $table) {
            Schema::dropIfExists('physiotherapist');
        });
    }
}
