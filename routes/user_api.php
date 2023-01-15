<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\User\ReservationController as UserReservationController;
use App\Http\Controllers\User\RoomController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

    //https://github.com/mujahed08/bill-app/tree/main/src/services

    Route::post('room/store',[RoomController::class,'store']);
    Route::post('room/delete',[RoomController::class,'delete']);
    Route::get('room/get-amenities',[RoomController::class,'handleAmenities']);
    Route::get('room/index',[RoomController::class,'index']);
    Route::post('login',[CustomerController::class,'login']);

    Route::prefix("reservation")->namespace("User")->group(function(){
        Route::post('index',[UserReservationController::class,'handleIndex']);
    });

    // Route::middleware('auth:sanctum')->post('update-device-key',[CustomerController::class,'handleDeviceKeyUpdateOrCreate']);
    // Route::middleware('auth:sanctum')->prefix("reservation")->namespace("Customer")->group(function(){
    //     Route::post('store',[ReservationController::class,'handleStore']);
    //     Route::post('index',[ReservationController::class,'handleIndex']);
    // });
?>
