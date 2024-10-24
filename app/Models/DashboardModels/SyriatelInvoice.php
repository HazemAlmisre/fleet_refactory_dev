<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SyriatelInvoice extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'order_id', 'userPhone', 'user_id','amount','otp','token',"merchantMSISDN"
    ];

    /**
     * Get the user that owns the SyriatelInvoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

        /**
     * Get the user that owns the SyriatelInvoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
