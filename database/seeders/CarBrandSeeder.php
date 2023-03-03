<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarBrand;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_brands = ['pagani', 'buggati', 'lada', 'maserati', 'ferrari', 'lambogrini', 'rolls-royce'];
        foreach($car_brands as $brand){
            CarBrand::create(['car_brand' => $brand]);
        }
    }
}
