<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shift;
use Faker\Generator as Faker;

$factory->define(Shift::class, function (Faker $faker) {
    static $seed = 0;

    $faker->seed($seed++);

    return [
        'user_id' => factory(App\User::class),
        'day' => $faker->dateTimeBetween('-30day', '+60day'),
        'desired' => $faker->boolean,
        'confirm' => $faker->boolean,
    ];
});
