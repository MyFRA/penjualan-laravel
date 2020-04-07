<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Perusahaan;
use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;

$factory->define(Perusahaan::class, function () {
	$faker = FakerFactory::create('id_ID');
    return [
        'nama' => $faker->company,
        'slogan' => $faker->realText(50, 1),
        'deskripsi' => $faker->text(200),
        'token' => uniqid(),
    ];
});
