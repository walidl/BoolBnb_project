<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_sponsor', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('sponsor_id')->unsigned()->index();
          $table->bigInteger('rental_id')->unsigned()->index();
          $table->timestamp('end_date')->nullable();//Nullable SOLO in fase di sviluppo 
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
        Schema::dropIfExists('rental_sponsor');
    }
}
