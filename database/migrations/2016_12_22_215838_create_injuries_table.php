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
            $table->integer('pathology_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('injuries', function (Blueprint $table) {
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('pathology_id')->references('id')->on('pathologies');
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
