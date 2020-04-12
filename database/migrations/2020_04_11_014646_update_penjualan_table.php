<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->unsignedBigInteger('total_biaya')->after('jumlah');
            $table->string('provinsi', 64)->after('traffics_id');
            $table->string('kabupaten', 64)->after('provinsi');
            $table->string('kecamatan', 64)->after('kabupaten');
            $table->string('desa', 64)->after('kecamatan');
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
