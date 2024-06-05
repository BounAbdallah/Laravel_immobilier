<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentaireController;


Route::get('/', [BienController::class, 'index'])->name('biens.index');
Route::get('biens', [BienController::class, 'index'])->name('biens.index');
Route::get('biens/{bien}', [BienController::class, 'show'])->name('biens.show');

// Routes for comments
Route::post('/biens/{bien}/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');
Route::get('/commentaires/{commentaire}/edit', [CommentaireController::class, 'edit'])->name('commentaires.edit');
Route::put('/commentaires/{commentaire}', [CommentaireController::class, 'update'])->name('commentaires.update');
Route::delete('/commentaires/{commentaire}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');

// Routes for user authentication
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Routes protected by authentication
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [DashboardController::class, 'create'])->name('create_bien');
    Route::post('/biens', [DashboardController::class, 'store'])->name('store_bien'); // This is for creating new Bien
    Route::get('/biens/{id}/edit', [DashboardController::class, 'edit'])->name('edit_bien');
    Route::put('/biens/{id}', [DashboardController::class, 'update'])->name('update_bien'); // This is for updating existing Bien
    Route::delete('/biens/{id}', [DashboardController::class, 'delete'])->name('delete_bien');
});
