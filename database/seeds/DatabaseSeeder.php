<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
       	'name' => 'Tomy Wibowo',
       	'email' => 'myfragithub@gmail.com',
       	'password' => bcrypt('maturnuwun'),
       ]);
    }
}
