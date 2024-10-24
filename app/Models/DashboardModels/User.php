<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type','nt_number','avatar','phone','api_token'
        // hazem added herer and phpMyAdmin
        ,"otp_code"
        ,"otp_verified"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Office()
    {
        if(auth()->user()->user_type == 1){

            return $this->hasOne(Office::class);
        }else{
            return null;
        }
    }
    public function Driver()
    {
        if(auth()->user()->user_type == 2){

            return $this->hasOne(Driver::class);
        }else{
            return null;
        }
        //  return $this->hasOne(Driver::class);
    }
    public function Customer()
    {
        if($this->attributes['user_type'] == 3){

            return $this->hasOne(Customer::class);
        }else{
            return null;
        }

    }
    public function Coupons()
    {
        return $this->hasMany(Coupon::class);
    }
    public function Wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    public function Earnings()
    {
        return $this->hasOne(Earning::class);
    }
}
