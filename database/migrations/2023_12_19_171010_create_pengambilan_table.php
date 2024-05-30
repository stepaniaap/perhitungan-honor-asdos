<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengambilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengambilan', function (Blueprint $table) {
            $table->bigIncrements('id_pengambilan');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
	        $table->unsignedBigInteger('id_makul')->nullable();
            $table->foreign('id_makul')->references('id_makul')->on('matakuliah');
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
        Schema::dropIfExists('pengambilan');
    }
}

