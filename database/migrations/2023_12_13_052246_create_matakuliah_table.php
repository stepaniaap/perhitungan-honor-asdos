<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode_mk',8);
            $table->string('nama_mk',100);
            $table->integer('bobot_sks');
            $table->char('grup',5);
            $table->string('ruang',100);
            $table->string('waktu',100);
            $table->string('dosen_pengampu',100);
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
        Schema::dropIfExists('matakuliah');
    }
}
