<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $appends = ['status'];
    public function getStatusAttribute(){
       $status = (int) $this->attributes['status'];
       return $status;
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Office()
    {
        return $this->belongsTo(Office::class);
    }

    public function Vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }

}
