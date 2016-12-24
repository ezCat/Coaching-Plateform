<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_match');
            $table->integer('club_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->integer('team_id')->unsigned();
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
