<?php

use Illuminate\Database\Seeder;

class MessageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Message::class, 50)->make()
          ->each(function($message){

            $rental = App\Rental::inRandomOrder()->first();
            $user = $rental->user;

            $message->rental()->associate($rental);
            $message->user()->associate($user);
            $message->save();
          });
    }
}
