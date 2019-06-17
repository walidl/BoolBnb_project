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
      factory(App\Rental::class,5)->create();
    }
}
