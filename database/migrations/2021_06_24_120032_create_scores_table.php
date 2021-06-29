<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id('id_score');
            $table->float('minimum_score');
            $table->float('score');
            $table->unsignedBigInteger('id_santri');
            $table->unsignedBigInteger('id_course');
            $table->timestamps();
            $table->foreign('id_santri')->references('id')->on('users');
            $table->foreign('id_course')->references('id_course')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
