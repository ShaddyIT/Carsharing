<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEvent extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'event_id', 'fuel', 'milleage', 'latitude', 'longitude'];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function car(){
        return $this->belongsTo(FleetOfCar::class);
    }
    
}
