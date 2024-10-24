<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
   public function sendNot($userId,$title,$body,$token,$sound)
   {
    $notification = new Notification();
    $notification->user_id = $userId;
    $notification->title = $title;
    $notification->description = $body;
    $notification->save();
    $SERVER_API_KEY = 'AAAAyNLXoB8:APA91bGeVLQ0A7o7ODw2-7cJri_XUFDOp0QLRD2-B6EcU35HfYeNACQybFPT2Vj8vp5ly_pQ0-wTmKF5MJyBlk35Gg7NwE0TQxzDIgU-RqKaKn8MMj_lBigQJA0Z0_kRqUNJqKnRl1nW';

    $token_1 = $token;

    $data = [

        "registration_ids" => [
            $token_1
        ],

        "notification" => [

            "title" => $title,

            "body" => $body,

            "sound"=> $sound, // required for sound on ios
            "playSound"=>true,
            'channelId'=>'default'

        ],
        "priority"=> "high"

    ];

    $dataString = json_encode($data);

    $headers = [

        'Authorization: key=' . $SERVER_API_KEY,

        'Content-Type: application/json',

    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);

   }
}
