<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {

      
      Schema::table('rental_service', function (Blueprint $table) {

        $table->foreign('rental_id','rental_service')
              ->references('id')
              ->on('rentals')
              ->onDelete('cascade');

        $table->foreign('service_id','service_cervice')
              ->references('id')
              ->on('services')
              ->onDelete('cascade');
      });

      Schema::table('rentals', function (Blueprint $table) {

        $table->foreign('user_id','user_rental')
              ->references('id')
              ->on('users');
      });

      Schema::table('messages', function (Blueprint $table) {

        $table->foreign('user_id','user_message')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');

        $table->foreign('rental_id','rental_message')
        ->references('id')
        ->on('rentals')
        ->onDelete('cascade');

      });

<<<<<<< HEAD
=======
     });

      Schema::table('rental_sponsor', function (Blueprint $table) {

        $table->foreign('rental_id','rental_sp')
              ->references('id')
              ->on('rentals')
              ->onDelete('cascade');

        $table->foreign('sponsor_id','sponsor_rn')
              ->references('id')
              ->on('sponsors')
              ->onDelete('cascade');

     });
>>>>>>> master
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('messages', function(Blueprint $table){

          $table->dropForeign('user');
          $table->dropForeign('rental');
        });

        Schema::create('rentals', function (Blueprint $table) {

          $table->dropForeign('user');

        });
    }
}
