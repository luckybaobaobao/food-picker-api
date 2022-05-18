<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('client_key');
            $table->string('name');
            $table->float('latitude');
            $table->float('longitude');

            $table->unsignedBigInteger('cuisine_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();


            $table->foreign('cuisine_id')->references('id')->on('cuisines');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
