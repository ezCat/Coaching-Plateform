<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_player', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('team_player', function (Blueprint $table) {
            $table->foreign('player_id')->references('id')->on('players');
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
        Schema::drop('team_player');
    }
}
