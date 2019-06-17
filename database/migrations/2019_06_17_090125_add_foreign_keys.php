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
      // Schema::table('messages', function(Blueprint $table){
      //
      //   $table->foreign('user_id', 'user')
      //         ->reference('id')
      //         ->on('users')
      //         ->onDelete('cascade');
      //   $table->foreign('rental_id', 'rental')
      //         ->reference('id')
      //         ->on('rentals')
      //         ->onDelete('cascade');
      // });

      Schema::table('rentals', function (Blueprint $table) {

        $table->foreign('user_id','user')
              ->references('id')
              ->on('users');

      });

      Schema::table('rental_service', function (Blueprint $table) {

        $table->foreign('rental_id','rental')
              ->references('id')
              ->on('rentals')
              ->onDelete('cascade');

        $table->foreign('service_id','service')
              ->references('id')
              ->on('services')
              ->onDelete('cascade');

     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function(Blueprint $table){

          $table->dropForeign('user');
          $table->dropForeign('rental');
        });

        Schema::create('rentals', function (Blueprint $table) {

          $table->dropForeign('user');

        });
    }
}
