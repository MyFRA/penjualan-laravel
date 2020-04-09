<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPerusahaanIdColumnTableTraffics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('traffics', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->after('id');

            $table->index(['perusahaan_id']);
            $table->foreign('perusahaan_id')->references('id')->on('perusahaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trafics', function (Blueprint $table) {
            //
        });
    }
}
