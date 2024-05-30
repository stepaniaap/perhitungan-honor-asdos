<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->bigIncrements('id_presensi');
            $table->unsignedBigInteger('id_pengambilan')->nullable();
            $table->foreign('id_pengambilan')->references('id_pengambilan')->on('pengambilan');
            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('users');
            $table->datetime('check_in')->nullable();
            $table->datetime('check_out')->nullable();
            $table->string('status_presensi')->nullable();
            $table->integer('duration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi');
    }
}

