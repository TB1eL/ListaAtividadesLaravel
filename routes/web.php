<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rotas protegidas pelo login do Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rota do seu CRUD de Alunos (ATV 4 e 13)
    Route::resource('alunos', AlunoController::class);
});

// Suas rotas com Middleware de Role (ATV 21)
Route::get('/admin', function () {
    return 'Área restrita: Apenas Administradores.';
})->middleware(['auth', 'role:admin']);

Route::get('/professor', function () {
    return 'Área restrita: Apenas Professores.';
})->middleware(['auth', 'role:professor']);

require __DIR__.'/auth.php';