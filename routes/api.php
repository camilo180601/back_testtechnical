<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\AcomodacionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('hoteles', HotelController::class);
Route::post('habitaciones', [HabitacionController::class, 'store']);
Route::post('acomodaciones', [AcomodacionController::class, 'store']);
