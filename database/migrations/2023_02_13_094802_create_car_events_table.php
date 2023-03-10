<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('fleet_of_cars');
            $table->foreignId('event_id')->constrained();
            $table->smallInteger('fuel')->unsigned();
            $table->integer('milleage')->unsigned();
            $table->float('latitude', 8,6);
            $table->float('longitude', 8,6);
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
        Schema::dropIfExists('car_events');
    }
};
