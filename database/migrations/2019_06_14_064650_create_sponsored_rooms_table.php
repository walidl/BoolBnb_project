<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsoredRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsored_rooms', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('sponsor_id')->unsigned()->index();
          $table->bigInteger('rental_id')->unsigned()->index();
          $table->date('end_date');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsored_rooms');
    }
}
