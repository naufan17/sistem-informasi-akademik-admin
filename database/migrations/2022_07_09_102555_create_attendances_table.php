<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('id_attendance');
            $table->string('year');
            $table->enum('semester', ['Genap', 'Ganjil']);
            $table->float('minimum_attendance_mdnu');
            $table->float('attendance_mdnu');
            $table->float('minimum_attendance_asrama');
            $table->float('attendance_asrama');
            $table->unsignedBigInteger('id_santri');
            $table->timestamps();
            $table->foreign('id_santri')->references('id')->on('santris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
