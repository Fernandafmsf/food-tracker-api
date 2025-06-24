<?php

use App\Http\Controllers\FoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/foods/search', [FoodController::class, 'search'])->middleware('auth:sanctum');
