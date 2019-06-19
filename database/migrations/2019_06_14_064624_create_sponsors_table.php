<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->integer('duration');
            $table->float('price',3,2);
            $table->timestamps();
        });

        DB::table('sponsors')->insert(
        [
         'name' => 'one_day',
         'duration' => 24,
         'price' => 2.99

       ]);

        DB::table('sponsors')->insert(
        [
         'name' => 'three_days',
         'duration' => 72,
         'price' => 5.99

       ]);

        DB::table('sponsors')->insert(
        [
         'name' => 'six_days',
         'duration' => 144,
         'price' => 9.99

       ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors');
    }
}
