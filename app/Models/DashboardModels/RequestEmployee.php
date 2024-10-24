<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestEmployee extends Model
{
    protected $connection =  "second";
    protected $fillable = [
        'firstName', 'lastName', 'email','phoneNumber','age','city',"poistion","salary","startDate"
        ,"website","numOfExperience","notes"
    ];
}
