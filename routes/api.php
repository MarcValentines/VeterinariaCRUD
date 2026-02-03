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
Route::get('/animal/new', [AnimalController::class, 'store']);
Route::get('/animal/show', [AnimalController::class, 'show']);
Route::get('/animal/update', [AnimalController::class, 'update']);
Route::get('/animal/delete', [AnimalController::class, 'destroy']);

//funciones propietarios
Route::get('/propietarios/list', [PropietariController::class, 'index']);
Route::get('/propietarios/new', [PropietariController::class, 'store']);
Route::get('/propietarios/show', [PropietariController::class, 'show']);
Route::get('/propietarios/update', [PropietariController::class, 'update']);
Route::get('/propietarios/delete', [PropietariController::class, 'destroy']);