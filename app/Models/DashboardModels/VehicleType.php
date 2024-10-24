<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    public function Vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
