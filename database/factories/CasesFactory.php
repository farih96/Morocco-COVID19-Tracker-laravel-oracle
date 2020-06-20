<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cases;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Cases::class, function (Faker $faker) {
    $CONFIRMED = rand(1, 30);
    $DEATHS = rand(0, 4);
    $RECOVERED = rand(1, 8);
    $region_id = rand(1, 12);
    if($region_id==1) $ville_id = rand(1, 8);
    if($region_id==2) $ville_id = rand(9, 13);
    if($region_id==3) $ville_id = rand(14, 18);
    if($region_id==4) $ville_id = rand(19, 22);
    if($region_id==5) $ville_id = rand(23, 26);
    if($region_id==6) $ville_id = rand(27, 31);
    if($region_id==7) $ville_id = rand(32, 34);
    if($region_id==8) $ville_id = rand(35, 37);
    if($region_id==9) $ville_id = rand(38, 40);
    if($region_id==10) $ville_id = rand(41, 43);
    if($region_id==11) $ville_id = rand(44, 47);
    if($region_id==12) $ville_id = rand(48, 49);



    return [
        'CONFIRMED' => $CONFIRMED,
        'DEATHS'=> $DEATHS,
        'RECOVERED'=> $RECOVERED,
        'DAY'=> $faker->dateTimeBetween('-1 month', '+1 days'),
        'ville_id'=> $ville_id,
        'region_id'=> $region_id,
    ];
});
