<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProvinsiKabupatenKecamatanKelurahanColumnOnTabelKeranjang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keranjang', function (Blueprint $table) {
            $table->dropColumn('alamat');
            $table->string('provinsi', 64)->after('traffics_id');
            $table->string('kabupaten', 64)->after('provinsi');
            $table->string('kecamatan', 64)->after('kabupaten');
            $table->string('kelurahan', 64)->after('kecamatan');
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
