<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'content' => $faker->text($maxNbChars = 200) ,
        'sent_date' => $faker->date,
    ];
});
