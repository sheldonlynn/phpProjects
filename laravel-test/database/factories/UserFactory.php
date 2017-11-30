<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'linkedinurl' => $faker->url,
        'streetaddress' => $faker->streetAddress,
        'city' => $faker->numberBetween(1, 250000),
        'stateid' => $faker->numberBetween(1, 5000),
        'countryid' => $faker->numberBetween(1, 200),
        'postalzipcode' => $faker->postcode,
        'workphone' => $faker->unique()->email,
        'workphoneextension' => $faker->unique()->email,
        'mobilephone' => $faker->unique()->email,
        'homephone' => $faker->unique()->email,
        'middlename' => $faker->unique()->email,

        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
