<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodEntryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/foods/search', [FoodController::class, 'search'])->middleware('auth:sanctum');

Route::prefix('foods')->group( function (){
    Route::get('/search', [FoodController::class, 'search']);
    Route::post('/post', [FoodEntryController::class, 'store']);
    Route::get('/report', [FoodEntryController::class, 'relatorioDiario']);
});

//Criar rota de User com create, delete, update, list e rota de Login pra logar
Route::prefix('user')->group(function (){
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/fetch', [UserController::class, 'fetch']);
});
