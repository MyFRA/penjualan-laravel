<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatingForeignOnKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keranjang', function (Blueprint $table) {
            $table->foreign('perusahaan_id')->references('id')->on('perusahaan');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('barang_id')->references('id')->on('barang');
            $table->foreign('traffics_id')->references('id')->on('traffics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keranjang', function (Blueprint $table) {
            //
        });
    }
}
