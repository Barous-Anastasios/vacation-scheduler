<?php

use Faker\Generator as Faker;

$factory->define(App\Application::class, function (Faker $faker) {
    return [
        'start' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
        'end' => $faker->dateTimeBetween('+3 week', '+4 weeks'),
        'reason' => $faker->text,
        'user_id' => 1,
        'status_id' => rand(1, 3),
        'created_at' => $faker->dateTimeBetween('-12 months', '-2 months')
    ];
});
