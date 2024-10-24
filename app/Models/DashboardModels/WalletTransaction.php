<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    protected $appends = ['sender','reciver','sender_wallet','reciver_wallet'];
    public function getSenderAttribute(){
       $sender = User::find($this->attributes['sender_id']);
       return $sender;
    }
    public function getReciverAttribute(){
        $reciver = User::find($this->attributes['reciver_id']);
        return $reciver;
     }
     public function getReciverWalletAttribute(){
        $reciver = Wallet::find($this->attributes['reciver_wallet_id']);
        return $reciver;
     }
     public function getSenderWalletAttribute(){
        $reciver = Wallet::find($this->attributes['sender_wallet_id']);
        return $reciver;
     }

}
