<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\AcomodacionController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CantidadHabitacionesController;

Route::apiResource('ciudades', CiudadController::class);
Route::apiResource('tipos-habitacion', TipoHabitacionController::class);
Route::apiResource('acomodaciones', AcomodacionController::class);
Route::apiResource('hoteles', HotelController::class);
Route::apiResource('cantidad-habitaciones', CantidadHabitacionesController::class);