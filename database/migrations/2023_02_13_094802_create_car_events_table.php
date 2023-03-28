<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\CarEvent;

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
            $table->uuid('id')->primary();
            $table->foreignUuid('car_id')->constrained('fleet_of_cars');
            $table->enum('event', CarEvent::getValues())->default(CarEvent::Status);;
            $table->smallInteger('fuel')->unsigned();
            $table->integer('milleage')->unsigned();
            $table->float('latitude', 8,6);
            $table->float('longitude', 8,6);
            $table->timestamps();
            $table->softDeletes();
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
