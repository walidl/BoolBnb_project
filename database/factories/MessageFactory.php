<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'content' => $faker->text(150),
        'sender'=> $faker->safeEmail,
        'sent_date' => $faker->date('m-d', 'now')
    ];
});
