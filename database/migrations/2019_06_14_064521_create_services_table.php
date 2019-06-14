<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('services', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('description');
          $table->string('icon');
          $table->timestamps();
      });

      DB::table('services')->insert(
      [
       'name' => 'Wi-Fi',
       'description' => 'Wi-Fi connection available',
       'icon' => 'fas fa-wifi'

     ]);

     DB::table('services')->insert(
     [
      'name' => 'TV',
      'description' => 'Tv available',
      'icon' => 'fas fa-wifi'

    ]);

     DB::table('services')->insert(
     [
      'name' => 'parking',
      'description' => ' Free parking spaces available',
      'icon' => 'fas fa-car'

      ]);
      DB::table('services')->insert(
      [
       'name' => 'accessibility',
       'description' => 'disabled accessibility',
       'icon' => 'fab fa-accessible-icon'

     ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
