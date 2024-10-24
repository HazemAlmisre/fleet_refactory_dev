<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionEmployee extends Model
{
    protected $connection =  "second";  
    protected $fillable = [
        'name',
    ];
}
