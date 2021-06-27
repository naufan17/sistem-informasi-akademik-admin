<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id('id_classroom');
            $table->string('year');
            $table->integer('current_semester');
            $table->unsignedBigInteger('id_santri');
            $table->unsignedBigInteger('id_course');
            $table->timestamps();
            $table->foreign('id_santri')->references('id')->on('users');
            $table->foreign('id_course')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
