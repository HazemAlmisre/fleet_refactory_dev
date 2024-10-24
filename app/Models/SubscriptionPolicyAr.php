<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPolicyAr extends Model
{
    protected $table = 'subscription_policy_ars';


    protected $fillable = [
        'label',
        'text',
    ];
}
