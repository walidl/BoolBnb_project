<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Rental;
use Faker\Generator as Faker;

$factory->define(Rental::class, function (Faker $faker) {

  return [
    'title' => $faker->sentence(4,true),
    'description' => $faker->paragraph(5),
    'rooms' => $faker->numberBetween(1, 6),
    'bathrooms' => $faker->numberBetween(1, 3),
    'beds' =>$faker->numberBetween(1, 4),
    'square_meters' => $faker->randomFloat(2, 4.00, 15.00),
    'address' =>$faker->address ,
    'lat' =>$faker->latitude,
    'lon' =>$faker->longitude,
    'image' => (rand(0,1) == 0 ? 'image_prova.jpg' : 'image_prova2.jpg')
  ];
});
