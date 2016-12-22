<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInjuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injuries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_injury');
            $table->date('date_recover_injury');
            $table->integer('player_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->integer('pathologies_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('injuries', function (Blueprint $table) {
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('pathologies_id')->references('id')->on('pathologies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('injuries');
    }
}
