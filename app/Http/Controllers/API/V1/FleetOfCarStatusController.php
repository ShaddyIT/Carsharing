<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\FleetOfCar;
use Illuminate\Http\Request;

class FleetOfCarStatusController extends Controller
{

    public function getFreeCar(){
        return FleetOfCar::free()->get();
    }

    public function getRentCar(){
        return FleetOfCar::rent()->get();
    }
}
