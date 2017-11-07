<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Show::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->sentence(4),
        'informacion' => $faker->sentence(4),
        'start' => $faker->dateTimeThisMonth(),
        'end' => $faker->dateTimeThisMonth(),
        'color' => $faker->hexColor,
        'id_ciudad' => $faker->sentence(4),
        'id_banda' => $faker->sentence(4),
    ];
});