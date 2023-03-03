<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetOfCar extends Model
{
    use HasFactory;

    public function car_status(){
        return $this->belongsTo(CarStatus::class);
    }

    public function car_model(){
        return $this->belongsTo(CarModel::class);
    }

    public function car_events(){
        return $this->hasMany(CarEvent::class);
    }

    public function user_rents(){
        return $this->hasMany(UserRent::class, 'car_id');
    }
}
