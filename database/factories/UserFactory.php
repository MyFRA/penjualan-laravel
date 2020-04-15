<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Perusahaan;
use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	// $faker = Faker::create('id_ID');
	$perusahaanObj = Perusahaan::get();
    foreach ($perusahaanObj as $usaha) {
       $perusahaan[] = $usaha->id;
    };
    return [
        'name'          => $faker->name,
        'email'         => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'      => bcrypt('mypenjualan'), // password
        'remember_token'=> Str::random(10),
    	'umur'          => $faker->numberBetween(16, 60),
    	'alamat'        => $faker->state,
        'negara'        => $faker->country,
        'instansiasi'   => $faker->company,
        'perusahaan_id' => $faker->randomElement($perusahaan),
        'role'          => $faker->randomElement(['author','pemilik','administrator','anggota']),
        'deskripsi'     => $faker->text(200),
    ];
});
