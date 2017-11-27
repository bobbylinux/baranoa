<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->nullable();
            $table->string('description',255)->nullable();
            $table->integer('calendar_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->boolean('all_day')->default(FALSE);
            $table->string('repeat_mode',11)->nullable();
            $table->integer('repeat_count')->nullable();
            $table->integer('day_only_weekdays')->nullable();
            $table->string('week_days',20)->nullable();
            $table->integer('month_weeknumber')->nullable();
            $table->integer('month_weekday')->nullable();
            $table->dateTime('month_repeatdate')->nullable();
            $table->string('event_type',20)->nullable();
            $table->integer('rel_event_id')->nullable();
            $table->dateTime('repeat_end_date')->nullable();
            $table->integer('event_delete_ind')->nullable();
            $table->integer('recur_sequence')->nullable();
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
        Schema::dropIfExists('events');
    }
}
