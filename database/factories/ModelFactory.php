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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->safeEmail,
    ];
});

$factory->define(App\Models\BeerRequest::class, function (Faker\Generator $faker) {

    $styles = [
        'Amber Ale',
        'Cream Ale',
        'English Bitter',
        'Pale Ale',
        'Porter',
        'Stout',
    ];

    return [
        'user_id' => 1,
        'beer_name' => title_case($faker->words(2, true)),
        'beer_style' => $faker->randomElement($styles),
        'brewery_name' => $faker->company,
        'brewery_location' => $faker->city . ', ' . $faker->stateAbbr,
    ];
});