<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

        // check Password function
        if (! function_exists('checkPassWord')) {
            function checkPassWord($password , $hashedPassword) :bool {
                return Hash::check($password, $hashedPassword);
            }
        }

        // create Token function
        function getToken($user) :String {
         return $user->createToken('API Token')->accessToken;
        }


        // hash data function
        function hashData($data) : String{
            return Hash::make($data);
        }

        // make Exception function
        function make_exception( $message , $code = 500 ){
            throw new Exception(  $message , $code );
        }

        function setCatch($key, $value) : void{
            Cache::put($key, $value, 600);
        }

        function getCatch($key){
            return Cache::get($key);
        }


