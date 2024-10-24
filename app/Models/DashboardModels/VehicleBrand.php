<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    public function Vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
