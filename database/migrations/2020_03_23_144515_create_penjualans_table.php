<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->string('nama_pembeli');
            $table->unsignedBigInteger('barang_id');
            $table->enum('status', ['Offline', 'Online']);
            $table->unsignedBigInteger('traffics_id');
            $table->unsignedBigInteger('alamat_id');
            $table->integer('jumlah');
            $table->integer('keuntungan');


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
        Schema::dropIfExists('penjualans');
    }
}
