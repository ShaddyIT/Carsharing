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
        Schema::create('car_models', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('car_brand_id')->constrained();
            $table->string('car_model');
            $table->string('steering_wheel_layout');
            $table->string('type_of_gearbox');
            $table->string('car_class');
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
        Schema::dropIfExists('car_models');
    }
};
