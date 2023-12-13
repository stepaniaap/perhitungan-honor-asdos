<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asdos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nim',8);
            $table->foreign('nim')->references('username')->on('users');
            $table->string('nama',100);
            $table->char('bank',10);
            $table->string('no_rek',100);
            $table->string('matakuliah',100);
            $table->string('matakuliah2',100);
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
        Schema::dropIfExists('asdos');
    }
}
