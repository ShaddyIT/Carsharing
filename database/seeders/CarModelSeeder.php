<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_brands = [
            1 => ['Utopia', 'Huayra', 'Zonda R'],
            2 => ['Chiron Sport', 'Mistral', 'La Voiture Noire'],
            3 => ['Granta Sport', 'Priora 2', 'Kalina Sport'],
            4 => ['Ghibli', 'Levante', 'Quattroporte'],
            5 => ['Roma', 'Protofino', '488Pista'],
            6 => ['Aventador', 'Huracan', 'Urus'],
            7 => ['Wraith', 'Ghost', 'Cullinan'],
        ];
        foreach ($car_brands as $car_brand => $car){
            foreach($car as $model){
                if ($car_brand == 3){
                    $car_class = 'супер-спорткар';
                } else {
                    $car_class = 'бюджетный повседнев';
                }
                $type_of_gearbox = ['акпп','мкпп'];
                $steering_wheel_layout = ['левый','правый'];
                CarModel::create([
                    'car_brand_id' => $car_brand,
                    'car_model' => $model,
                    'steering_wheel_layout' => $steering_wheel_layout[rand(0,1)],
                    'type_of_gearbox' => $type_of_gearbox[rand(0,1)],
                    'car_class' => $car_class
                ]);
            }
        }
    }
}
