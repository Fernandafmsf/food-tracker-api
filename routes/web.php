<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodEntryController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

