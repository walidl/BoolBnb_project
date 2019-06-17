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
      Schema::table('rentals', function (Blueprint $table) {

        $table->foreign('user_id','user')
              ->references('id')
              ->on('users');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::create('rentals', function (Blueprint $table) {

        $table->dropForeign('user');
        // $table->dropForeign('category');

      });
    }
}
