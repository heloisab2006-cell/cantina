<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PedidoController;

// Página principal do cardápio (lista de produtos)
Route::get('/', [ProdutoController::class, 'index'])->name('cantina');


Route::post('/carrinho/adicionar', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho/remover/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');
Route::post('/carrinho/atualizar/{id}', [CarrinhoController::class, 'atualizar'])->name('carrinho.atualizar');

Route::post('/carrinho/checkout', [CarrinhoController::class, 'checkout'])->name('carrinho.checkout');


/*
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

// CRUD completo de produtos
Route::resource('produtos', ProdutoController::class);

*/

?>


