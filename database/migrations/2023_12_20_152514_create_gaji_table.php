<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiTable extends Migration
{
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->bigIncrements('id_gaji');
            $table->unsignedBigInteger('id_presensi')->nullable();
            $table->unsignedBigInteger('id_pengambilan')->nullable();
            $table->unsignedBigInteger('id')->nullable();
            $table->string('bulan')->nullable();
            $table->integer('gaji_total');
            $table->timestamps();

            // Menambahkan foreign key dengan onDelete cascade
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_presensi')->references('id_presensi')->on('presensi')->onDelete('cascade');
            $table->foreign('id_pengambilan')->references('id_pengambilan')->on('pengambilan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gaji');
    }

}
