<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BalanceUp;
use App\Models\CarEvent;
use App\Models\FleetOfCar;
use App\Models\UserRent;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CarBrandSeeder::class,
            CarModelSeeder::class
        ]);
        User::factory(10)->create();
        BalanceUp::factory(15)->create();
        FleetOfCar::factory(10)->create();
        CarEvent::factory(12)->create();
        UserRent::factory(10)->create();
        $this->call([
            UserBalanceSeeder::class
        ]);
    }
}
