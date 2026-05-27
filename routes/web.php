<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CantinaController;

// Rota principal da página da cantina
Route::get('/', [CantinaController::class, 'index'])->name('cantina.index');

// Rota correta que o formulário chama ao clicar no "+"
Route::post('/carrinho/adicionar', [CantinaController::class, 'adicionar'])->name('carrinho.add');

// Rota correta que esvazia o carrinho ao clicar no "X"
Route::post('/carrinho/limpar', [CantinaController::class, 'limpar'])->name('carrinho.clear');
Route::post('/carrinho/remover', [CantinaController::class, 'remover'])->name('carrinho.remove');
