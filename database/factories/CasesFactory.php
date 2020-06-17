<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cases;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Cases::class, function (Faker $faker) {
    $CONFIRMED = rand(1, 30);
    $DEATHS = rand(0, 4);
    $RECOVERED = rand(1, 8);
    $ville_id = rand(1, 49);
    $region_id = rand(1, 12);
    return [
        'CONFIRMED' => $CONFIRMED,
        'DEATHS'=> $DEATHS,
        'RECOVERED'=> $RECOVERED,
        'DAY'=> $faker->dateTimeBetween('-1 month', '+2 days'),
        'ville_id'=> $ville_id,
        'region_id'=> $region_id,
    ];
});
