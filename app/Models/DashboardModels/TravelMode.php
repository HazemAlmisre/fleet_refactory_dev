<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelMode extends Model
{


    public function Office()
    {
        return $this->belongsTo(Office::class);
    }
    public static function all($columns = array('*'))
    {
        if(auth()->user()->user_type == 1){
            $columns = is_array($columns) ? $columns : func_get_args();

            $instance = new static;

            return $instance->newQuery()->where('office_id',auth()->user()->Office->id)->where('is_deleted', '=', false)->get($columns);
        }

    }
    public static function all4cust($columns = array('*'))
    {

            $columns = is_array($columns) ? $columns : func_get_args();

            $instance = new static;

            return $instance->newQuery()->where('is_deleted', '=', false)->where('is_active', '=', true)->get($columns);


    }
}
