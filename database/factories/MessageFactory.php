<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'content' => $faker->text(200),
        'sender'=> $faker->safeEmail,
        'sent_date' => $faker->date('Y-m-d', 'now')
    ];
});
