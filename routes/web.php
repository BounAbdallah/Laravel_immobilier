<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentaireController;





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


Route::resource('biens', BienController::class);

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



// Cette route joue le rôle de protecteur du dashboard avec le middleware qui protege le dashboard par une authentification obligatoire avant d'y acceder
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

