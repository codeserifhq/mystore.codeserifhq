<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'founder' => $faker->firstName().' '.$faker->lastName(),
        'logo_file_type' => 'jpg',
        'address' => $faker->address,
        'contact' => $faker->randomNumber(9)
    ];
});
