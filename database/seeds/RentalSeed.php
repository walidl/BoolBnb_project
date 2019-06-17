<?php

use Illuminate\Database\Seeder;

class RentalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Rental::class,5)->make()
      ->each(function($rental){
        $user = App\User::where('renting',true)->inRandomOrder()->first();
        $rental->user()->associate($user);
        $rental->save();

        $services = App\Service::inRandomOrder()->take(rand(1,3))->get();
        $rental->services()->attach($services);
      });

    }
}
