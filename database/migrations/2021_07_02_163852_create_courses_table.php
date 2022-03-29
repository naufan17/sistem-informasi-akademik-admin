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
            $table->integer('sem');
            $table->enum('status', ['Aktif', 'Tidak aktif'])->default('Aktif');
            $table->unsignedBigInteger('id_grade');
            $table->unsignedBigInteger('id_schedule');
            $table->unsignedBigInteger('id_ustadz');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_grade')->references('id_grade')->on('grades');
            $table->foreign('id_schedule')->references('id_schedule')->on('schedules');
            $table->foreign('id_ustadz')->references('id_ustadz')->on('ustadzs');
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
