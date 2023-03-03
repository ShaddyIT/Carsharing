<?php

namespace Database\Factories;
use Carbon\Carbon;
use App\Models\FleetOfCar;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRent>
 */
class UserRentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition()
    {
        $car= FleetOfCar::inRandomOrder()->first()->id;
        $start_time = Carbon::createFromDate($this->faker->dateTime('now'));
        $end_time = Carbon::createFromDate($start_time);
        $end_time->addMinutes(rand(10, 5000));
        $countFinalCost = (FleetOfCar::find($car)->cost_per_minute) * ($end_time->diffInMinutes($start_time));
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'car_id' => $car,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'final_cost' =>  $countFinalCost
        ];
    }
}
