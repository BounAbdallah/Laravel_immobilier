<?php

use App\Models\Bien;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;


Route::get('/', [BienController::class, 'index']);


// Routes pour les biens
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


//sa permet de raccourcir les routes au préalable définit dans la méthode du controller
Route::resource('biens', BienController::class);


// Routes pour les users
// cette route nous affiche le formulaire dde connexion

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Cette route gére le traitement de la connexion de l'utilisateur
Route::post('login', [AuthController::class, 'login']);

// Cette route fais la déconnexion de l'utilisateur
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Cette route affiche le formulaire d'iscription d'un utilisateur
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Cette route gére le traitement de l'enregistrement plus validation des information avant d'enregistrer dans la base des  données
Route::post('register', [AuthController::class, 'register']);



// Cette route joue le rôle de protecteur du dashboard avec le middleware qui protege le dashboard par une authentification obligatoire avant d'y acceder
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

