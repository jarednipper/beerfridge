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

use Faker\Provider\Uuid;

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->safeEmail,
        'api_token' => Uuid::uuid(),
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

    $breweries = [
        'Barbarian Brewing',
        'Bear Island Brewing Company',
        'Bella',
        'Boise Brewing',
        'County Line Brewing',
        'Crescent Brewery',
        'Crooked Fence Brewery',
        'Grand Teton Brewing Co',
        'Laughing Dog Brewing',
        'Payette Brewing Co',
    ];

    $userId = App\Models\User::where('id', '>', 1)->inRandomOrder()->first()->id;

    return [
        'user_id' => $userId,
        'beer_name' => title_case($faker->words(2, true)),
        'beer_style' => $faker->randomElement($styles),
        'brewery_name' => $faker->randomElement($breweries),
        'brewery_location' => $faker->city . ', ' . $faker->stateAbbr,
    ];
});

$factory->define(App\Models\BeerRequestVote::class, function (Faker\Generator $faker) {

    $beerRequestId = App\Models\BeerRequest::where('id', '>', 1)->inRandomOrder()->first()->id;
    $userId = App\Models\User::where('id', '>', 1)->inRandomOrder()->first()->id;

    return [
        'beer_request_id' => $beerRequestId,
        'user_id' => $userId,
    ];

});
