<?php

use App\Models\Bien;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentaireController;

Route::get('/', [BienController::class, 'index']);

Route::get('/biens', [BienController::class, 'index']);
Route::get('/biens/ajouter', [BienController::class, 'ajouter']);
Route::post('/biens/traitement', [BienController::class, 'traitement']);
Route::get('/update-bien/{id}',[BienController::class,'update']);
Route::post('/update-bien/{id}',[BienController::class,'updateTraitement']);
Route::get('/bien/delete/{id}',[BienController::class,'delete']);


// Routes pour les commentaires
Route::post('/biens/{bien}/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');
Route::get('/commentaires/{commentaire}/edit', [CommentaireController::class, 'edit'])->name('commentaires.edit');
Route::put('/commentaires/{commentaire}', [CommentaireController::class, 'update'])->name('commentaires.update');
Route::delete('/commentaires/{commentaire}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');

Route::resource('biens', BienController::class);
