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
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('umur')->nullable();
            $table->string('alamat')->nullable();
            $table->string('negara', 50)->nullable();
            $table->string('instansiasi', 50)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->enum('role', ['author', 'pemilik', 'administrator', 'anggota'])->default('pemilik');
            $table->string('gambar')->nullable();
            $table->string('password');
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
