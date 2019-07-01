<?php

use Illuminate\Database\Seeder;

class RentalViewsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\RentalViews::class, 5)->make()
        ->each(function($rentalview){

          $rental = App\Rental::inRandomOrder()->first();
          $rentalview->rental()->associate($rental);

          $rentalview->save();

        });
    }
}
