<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //Belongs To User
    public function user(){
        return $this->belongsTo(User::class);
    }
   //Belongs to Customer 
    public function customer(){
        return $this->belongsTo(Customer::class);
    }


}
