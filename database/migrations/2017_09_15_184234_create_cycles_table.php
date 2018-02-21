<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('end_date')->nullable();
            $table->string('note')->nullable();
            $table->string('program')->nullable();
            $table->integer('patient_id');
            $table->string('final_report')->nullable();
            $table->timestamps();
            /*foreign keys*/
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
        Schema::dropIfExists('cycles');
    }
}
