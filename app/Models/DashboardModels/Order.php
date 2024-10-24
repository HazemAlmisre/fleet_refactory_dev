<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $appends = ['timers'];
    public function getTimersAttribute(){
       $status = intval($this->attributes['live_time']) ;
       return $status;
    }
    public function Driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function Office()
    {
        return $this->belongsTo(Office::class);
    }

    public function Vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
