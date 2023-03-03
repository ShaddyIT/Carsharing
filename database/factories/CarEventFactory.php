<?php

namespace Database\Factories;
use App\Models\FleetOfCar;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarEvent>
 */
class CarEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'car_id' => FleetOfCar::inRandomOrder()->first()->id,
            'event_id' => Event::inRandomOrder()->first()->id,
            'fuel' => $this->faker-> numberBetween(0, 60),
            'milleage' => $this->faker-> numberBetween(100, 99999),
            'latitude' => $this->faker-> latitude(-90, 90),
            'longitude' => $this->faker-> longitude(-180, 180)
        ];
    }
}
