<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUstadzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ustadzs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('place_born')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->bigInteger('id_number')->nullable();
            $table->string('blood')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->integer('RT')->nullable();
            $table->integer('RW')->nullable();
            $table->string('village')->nullable();
            $table->string('districs')->nullable();
            $table->string('regency')->nullable();
            $table->string('province')->nullable();
            $table->enum('status', ['Aktif', 'Tidak aktif'])->default('Aktif');
            $table->string('photo')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ustadzs');
    }
}
