<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\User\ReservationController as UserReservationController;
use App\Http\Controllers\User\RoomController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

    //https://github.com/mujahed08/bill-app/tree/main/src/services

    Route::post('login',[UserController::class,'login']);
    Route::middleware('auth:admins')->prefix("reservation")->namespace("User")->group(function(){
        Route::post('index',[UserReservationController::class,'handleIndex']);
    });
    Route::middleware('auth:admins')->post('update-device-key',[UserController::class,'handleDeviceKeyUpdateOrCreate']);
    Route::middleware('auth:admins')->prefix("room")->namespace("User")->group(function(){
        Route::post('store',[RoomController::class,'store']);
        Route::post('delete',[RoomController::class,'delete']);
        Route::get('get-amenities',[RoomController::class,'handleAmenities']);
        Route::get('index',[RoomController::class,'index']);
    });
?>
