<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CantinaController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PedidoController;

// Página principal do cardápio
Route::get('/', [CantinaController::class, 'index'])->name('cantina');

// Adicionar item ao carrinho
Route::post('/carrinho/adicionar', [CarrinhoController::class, 'adicionar'])
    ->name('carrinho.adicionar');

// Exibir carrinho
Route::get('/carrinho', [CarrinhoController::class, 'index'])
    ->name('carrinho');

// Remover item do carrinho
Route::delete('/carrinho/remover/{id}', [CarrinhoController::class, 'remover'])
    ->name('carrinho.remover');

// Finalizar pedido
Route::post('/pedido/finalizar', [PedidoController::class, 'finalizar'])
    ->name('pedido.finalizar');
