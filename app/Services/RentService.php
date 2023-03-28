<?php
namespace App\Services;

use App\Models\FleetOfCar;
use App\Models\UserRent;
use Illuminate\Support\Facades\DB;


class RentService
{
    public static function createRent($request){
        $response = DB::transaction(function() use ($request) {
            $carStatus = FleetOfCar::find($request->car_id)->car_status;
            if ($carStatus == '0'){
                DB::transaction(function() use ($request)
                {
                    UserRent::create($request->validated());
                    CarService::updateStatus($request->car_id, '1');
                    return response()->json(['text=>Rent start']);
                });
            } else {
                return response()->json(
                    ['text' => 'Car is not free']
                );
            }
        });
        return $response;
    }

    
}