<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastname,
        'birthday' => $faker->date,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'ciaociao1', // password
        'renting' => $faker->boolean, // true
        'remember_token' => Str::random(10),
    ];
});
