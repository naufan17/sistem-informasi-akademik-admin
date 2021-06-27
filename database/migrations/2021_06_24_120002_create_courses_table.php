<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('id_course');
            $table->string('course');
            $table->string('book');
            $table->string('grade');
            $table->string('schedule');
            $table->enum('semester', ['Genap', 'Ganjil']);
            $table->unsignedBigInteger('id_ustadz');
            $table->timestamps();
            $table->foreign('id_ustadz')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
