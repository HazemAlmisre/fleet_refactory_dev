<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function Office()
    {
        return $this->belongsTo(Office::class);
    }

    public function Driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function VehicleBrand()
    {
        return $this->belongsTo(VehicleBrand::class);
    }
    public function VehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }


}
