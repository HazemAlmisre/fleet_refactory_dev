<?php
namespace App\Const\Messages;


class ErrorMessages{

    static public $AccountAlreadyExists = "";
    static public $SomeThingWentWrong = 'some_thing_went_wrong';
    static public $invalidData = 'invalid data';
    static public $endOtp = 'endOtp';
    static public $notExait = "not_exait";
    static public $sendSuccess = "send success";

    static function getKey(string $key){
        return "messages." . $key;
    }

}

