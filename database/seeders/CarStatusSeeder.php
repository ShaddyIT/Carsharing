<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarStatus;

class CarStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_statuses = ['арендована', 'ремонтируется', 'свободна', 'мало бензина'];
        foreach ($car_statuses as $status){
            CarStatus::create(['status' => $status]);
        }
    }
}
