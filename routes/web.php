<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Formulário de login
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.post'); // Login do usuário
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form'); // Formulário de registro
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.post'); // Registro de usuário
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Logout do usuário

// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Dashboard
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile'); // Perfil do usuário
    Route::middleware(['auth'])->put('/profile', [ProfileController::class, 'update'])->name('profile.update');

});

// Rotas de gerenciamento de usuários
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Listar usuários
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Formulário de criação
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Criar usuário
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show'); // Mostrar usuário específico
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Editar usuário
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Atualizar usuário
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Deletar usuário
});
