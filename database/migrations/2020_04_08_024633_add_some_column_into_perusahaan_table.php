<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnIntoPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perusahaan', function (Blueprint $table) {
            $table->string('telp', 20)->after('logo')->nullable();
            $table->string('email', 128)->after('telp')->nullable();
            $table->string('fax', 32)->after('email')->nullable();
            $table->string('site', 64)->after('fax')->nullable();
            $table->string('facebook', 64)->after('site')->nullable();
            $table->string('instagram', 64)->after('facebook')->nullable();
            $table->string('linkedin', 64)->after('instagram')->nullable();
            $table->text('alamat')->after('linkedin')->nullable();
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
