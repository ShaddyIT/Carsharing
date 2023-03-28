<?php

namespace Database\Factories;

use App\Enums\CarStatus;
use App\Models\CarModel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FleetOfCar>
 */
class FleetOfCarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected function carNumber(){
        $symbols = ['А', 'В', 'Е', 'К', 'М', 'Н', 'О', 'Р', 'С', 'Т', 'У', 'Х'];
        $prefix =implode($this->faker->randomElements($symbols));
        $postfix = implode('', ($this->faker->randomElements($symbols, 2)));
        return $prefix . $this->faker->numberBetween(100, 999) . $postfix . $this->faker->numberBetween(1, 99);
    }


    public function definition()
    {
        return [
            'car_model_id'=> CarModel::inRandomOrder()->first()->id,
            'state_number'=>  $this->carNumber(),
            'vin_number'=> Str::random(17),
            'cost_per_minute'=> rand(5, 15),
            'car_status' => CarStatus::getRandomValue()
        ];
    }
}
