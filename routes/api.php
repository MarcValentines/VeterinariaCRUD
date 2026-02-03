<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PropietariController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//funciones animales
Route::get('/animal/list', [AnimalController::class, 'index']);
Route::post('/animal/new', [AnimalController::class, 'store']);
Route::get('/animal/show/{id}', [AnimalController::class, 'show']);
Route::put('/animal/update/{id}', [AnimalController::class, 'update']);
Route::get('/animal/delete/{id}', [AnimalController::class, 'destroy']);

//funciones propietarios
Route::get('/propietarios/list', [PropietariController::class, 'index']);
Route::post('/propietarios/new', [PropietariController::class, 'store']);
Route::get('/propietarios/show/{id}', [PropietariController::class, 'show']);
Route::put('/propietarios/update/{id}', [PropietariController::class, 'update']);
Route::get('/propietarios/delete/{id}', [PropietariController::class, 'destroy']);