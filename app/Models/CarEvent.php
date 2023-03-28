<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarEvent extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $fillable = ['car_id', 'event_id', 'fuel', 'milleage', 'latitude', 'longitude'];

    public function car(){
        return $this->belongsTo(FleetOfCar::class);
    }
    
}
