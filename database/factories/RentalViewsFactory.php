<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\RentalViews::class, function (Faker $faker) {
    return [
        'ip' => $faker->ipv4
    ];
});
