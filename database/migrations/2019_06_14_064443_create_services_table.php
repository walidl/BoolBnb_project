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
        'icon' => 'fas fa-tv'

      ]);

      DB::table('services')->insert(
      [
      'name' => 'Parking',
      'description' => ' Free parking spaces available',
      'icon' => 'fas fa-car'

      ]);

      DB::table('services')->insert(
      [
       'name' => 'Accessibility',
       'description' => 'Disabled accessibility',
       'icon' => 'fab fa-accessible-icon'

      ]);

      DB::table('services')->insert(
      [
        'name' => 'Pool',
        'description' => 'Pool available',
        'icon' => 'fas fa-swimmer'

      ]);

      DB::table('services')->insert(
      [
       'name' => 'Spa',
       'description' => 'Spa available',
       'icon' => 'fas fa-spa'

      ]);

      DB::table('services')->insert(
      [
        'name' => 'Airport shuttle',
        'description' => 'Airport shuttle available',
        'icon' => 'fas fa-shuttle-van'

      ]);

      DB::table('services')->insert(
      [
        'name' => 'Breakfast',
        'description' => 'Breakfast available',
        'icon' => 'fas fa-coffee'

      ]);

      DB::table('services')->insert(
      [
        'name' => 'Pet',
        'description' => 'Pet allowed',
        'icon' => 'fas fa-paw'

      ]);

      DB::table('services')->insert(
      [
        'name' => 'Gym',
        'description' => 'Gym available',
        'icon' => 'fas fa-dumbbell'

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
