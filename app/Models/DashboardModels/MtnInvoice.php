<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtnInvoice extends Model
{
    protected $fillable = [
        'Amount', 'TTL', 'user_id','Phone','OperationNumber','Code',"order_id"
    ];
}
