<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Models\Bien;

Route::get('/', [BienController::class, 'index']);


Route::get('/biens', [BienController::class, 'index']);