<?php

use App\Http\Controllers\Customer\ReservationController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
    //https://github.com/mujahed08/bill-app/tree/main/src/services
    Route::get('rooms',[CustomerController::class,'getRooms']);
    Route::post('login',[CustomerController::class,'login']);
    Route::middleware('auth:sanctum')->post('update-device-key',[CustomerController::class,'handleDeviceKeyUpdateOrCreate']);
    Route::middleware('auth:sanctum')->prefix("reservation")->namespace("Customer")->group(function(){
        Route::post('store',[ReservationController::class,'handleStore']);
        Route::post('index',[ReservationController::class,'handleIndex']);
    });
?>
