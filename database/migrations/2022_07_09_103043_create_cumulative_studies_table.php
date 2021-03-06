<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCumulativeStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cumulative_studies', function (Blueprint $table) {
            $table->id('id_cumulative_study');
            $table->string('year');
            $table->enum('semester', ['Genap', 'Ganjil']);
            $table->float('minimum_score')->nullable();
            $table->float('score')->nullable();
            $table->unsignedBigInteger('id_santri');
            $table->unsignedBigInteger('id_course');
            $table->timestamps();
            $table->foreign('id_santri')->references('id')->on('santris');
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
        Schema::dropIfExists('cumulative_studies');
    }
}
