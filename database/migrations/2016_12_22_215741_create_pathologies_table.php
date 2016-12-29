<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathologies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('muscle_id')->unsigned();
            $table->integer('severity_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('pathologies', function (Blueprint $table) {
            $table->foreign('muscle_id')->references('id')->on('muscles')->onDelete('cascade');
            $table->foreign('severity_id')->references('id')->on('severities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pathologies');
    }
}
