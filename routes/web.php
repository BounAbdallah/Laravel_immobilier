<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Models\Bien;

Route::get('/', [BienController::class, 'index']);


Route::get('/biens', [BienController::class, 'index']);
Route::get('/biens/ajouter',[BienController::class,'ajouter']);
Route::post('/biens/traitement',[BienController::class,'traitement']);
Route::get('/update-bien/{id}',[BienController::class,'update']);
Route::post('/update-bien/{id}',[BienController::class,'updateTraitement']);