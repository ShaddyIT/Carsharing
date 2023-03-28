<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = DB::table('car_brands')->pluck('id');
        $models = [
            ['Utopia', 'Huayra', 'Zonda R'],
            ['Chiron Sport', 'Mistral', 'La Voiture Noire'],
            ['Granta Sport', 'Priora 2', 'Kalina Sport'],
            ['Ghibli', 'Levante', 'Quattroporte'],
            ['Roma', 'Protofino', '488Pista'],
            ['Aventador', 'Huracan', 'Urus'],
            ['Wraith', 'Ghost', 'Cullinan'],
            ];
        
        $i=0;
        foreach($brands as $brand){
            $car_brands[$brand]=$models[$i++];
        }

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
