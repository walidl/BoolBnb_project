<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->integer('rooms')->unsigned();
            $table->integer('bathrooms')->unsigned();
            $table->integer('beds')->unsigned();
            $table->float('square_meters',5,2)->unsigned();
            $table->string('address');
            $table->string('image');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned()->index()->default(1);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
