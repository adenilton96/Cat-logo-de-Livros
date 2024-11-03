<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

// Rota raiz que redireciona para a lista de livros
Route::get('/', function () {
    return redirect()->route('livros.index');
});

// Rotas do recurso Livro
Route::resource('livros', LivroController::class);

// Rota fallback para redirecionar para a lista de livros
Route::fallback(function () {
    return redirect()->route('livros.index');
});
