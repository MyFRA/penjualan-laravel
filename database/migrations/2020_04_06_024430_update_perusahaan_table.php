<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perusahaan', function (Blueprint $table) {
            $table->string('nama', 100)->change();
            $table->string('slogan', 50)->after('nama')->nullable();
            $table->string('logo')->after('slogan')->nullable();
            $table->text('deskripsi')->after('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perusahaan', function (Blueprint $table) {
            //
        });
    }
}
