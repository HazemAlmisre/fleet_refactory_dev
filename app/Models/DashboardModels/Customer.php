<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }

}
