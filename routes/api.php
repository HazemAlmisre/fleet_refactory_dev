<?php

use App\Http\Controllers\Auth\CheckOtpController;
use App\Http\Controllers\Auth\ForegetPasswordController;
use App\Http\Controllers\Auth\SendOtpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/register',UserRegisterController::class);
Route::post('/login',UserLoginController::class);

Route::post('/send/otp',SendOtpController::class);
Route::post('/check/otp',CheckOtpController::class);
Route::post('/forget/password',ForegetPasswordController::class);

