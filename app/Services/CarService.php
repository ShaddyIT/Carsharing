<?php
namespace App\Services;

use App\Models\FleetOfCar;

class CarService
{
    // Изменяет статус машины
    public static function updateStatus($id, $status){
        $car = FleetOfCar::find($id)->update(['car_status' => $status]);
    }


    

}