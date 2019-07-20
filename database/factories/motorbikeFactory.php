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
$factory->define(App\motorbike::class, function (Faker\Generator $faker) {

    return [
        'make' => $faker->country,
        'model' => $faker->date('Y-m-d'),
        'color' => $faker->colorName,
        'weight' => $faker->numberBetween(20,50),
        'price' => $faker->numberBetween(100,1000),
        'image' => $faker->imageUrl(150,100),
    ];
});
