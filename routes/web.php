<?php

use App\Models\Bien;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [BienController::class, 'index']);



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
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/biens/create', [DashboardController::class, 'create'])->name('create_bien');
    Route::post('/biens', [DashboardController::class, 'store'])->name('store_bien');
    Route::get('/biens/{id}/edit', [DashboardController::class, 'edit'])->name('edit_bien');
    Route::put('/biens/{id}', [DashboardController::class, 'update'])->name('update_bien');
    Route::delete('/biens/{id}', [DashboardController::class, 'delete'])->name('delete_bien');
});
Route::resource('biens', BienController::class);
