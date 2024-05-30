<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('username', 40);
                $table->string('nama_lengkap',40);
                $table->string('no_tlp',40)->nullable();
                $table->string('email', 40)->nullable();
                $table->string('password', 80)->nullable();
                $table->enum('role',['asdos', 'admin', 'biro2'])->default('asdos');
                $table->string('nim')->nullable(); //barangkali perlu
                $table->string('bank')->nullable();
                $table->string('no_rek')->nullable();
                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
