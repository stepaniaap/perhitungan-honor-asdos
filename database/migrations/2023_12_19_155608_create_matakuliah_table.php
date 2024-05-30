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
            $table->bigIncrements('id_makul');
            $table->char('kode_mk',8)->nullable();
            $table->string('nama_mk',100)->nullable();
            $table->integer('bobot_sks')->nullable();
            $table->char('grup',5)->nullable();
            $table->string('ruang',100)->nullable();
            $table->string('waktu',100)->nullable();
            $table->string('dosen_pengampu',100)->nullable();
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
