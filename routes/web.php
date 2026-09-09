<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre', function () { return 'Página Sobre'; });
Route::get('/alunos', function () { return 'Página de Alunos'; });
Route::get('/contato', function () { return 'Página de Contato'; });
Route::get('/produto/{id}', function ($id) { return "Produto: {$id}"; });
Route::get('/categoria/{id}', function ($id) { return "Categoria: {$id}"; });
Route::get('/usuario/{id}', function ($id) { return "Usuário: {$id}"; });

Route::get('/admin', function () {
    return 'Área restrita: Apenas Administradores.';
})->middleware(['auth', 'role:admin']);

Route::get('/professor', function () {
    return 'Área restrita: Apenas Professores.';
})->middleware(['auth', 'role:professor']);