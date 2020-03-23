<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignForPenjualanTablePart2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->index(['traffics_id', 'alamat_id']);

            $table->foreign('perusahaan_id')->references('id')->on('perusahaan');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('barang_id')->references('id')->on('barang');
            $table->foreign('traffics_id')->references('id')->on('traffics');
            $table->foreign('alamat_id')->references('id')->on('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penjualan', function (Blueprint $table) {
            //
        });
    }
}
