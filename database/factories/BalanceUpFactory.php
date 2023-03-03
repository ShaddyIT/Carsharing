<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BalanceUp>
 */
class BalanceUpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => $this->faker->dateTime('now', null),
            'money' => $this->faker->numberBetween(1000, 9000),
        ];
    }
}
