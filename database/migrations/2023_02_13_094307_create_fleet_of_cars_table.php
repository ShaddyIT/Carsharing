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
        Schema::create('fleet_of_cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_model_id')->constrained('car_models');
            $table->string('state_number', 8);
            $table->string('vin_number');
            $table->smallInteger('cost_per_minute')->unsigned();
            $table->foreignId('car_status_id')->constrained('car_statuses');
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
        Schema::dropIfExists('fleet_of_cars');
    }
};
