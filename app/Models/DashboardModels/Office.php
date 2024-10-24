<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Drivers()
    {
        return $this->hasMany(Driver::class);
    }
    public function Vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
    public function Earnings()
    {
        return $this->hasMany(Earning::class);
    }
    public function TravelModes()
    {
        return $this->hasMany(TravelMode::class);
    }
}
