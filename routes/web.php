<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PedidoController;

// Página principal do cardápio (lista de produtos)
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');

// Carrinho
Route::prefix('carrinho')->group(function () {
    Route::get('/', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/adicionar', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
    Route::post('/remover/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');
    Route::post('/atualizar/{id}', [CarrinhoController::class, 'atualizar'])->name('carrinho.atualizar');
    Route::post('/checkout', [CarrinhoController::class, 'checkout'])->name('carrinho.checkout');
    Route::post('/carrinho/salvar-dados', [CarrinhoController::class, 'salvarDados'])->name('carrinho.salvarDados');
});

// API de quartos por setor
Route::get('/api/quartos/{setor}', function($setorId) {
    return \App\Models\Quarto::where('setor_id', $setorId)->get();
});


// Produtos (CRUD)
Route::get('/produtos/gerenciar', [ProdutoController::class, 'gerenciar'])->name('produtos.gerenciar');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

// Se quiser usar resource, mantenha apenas ele OU as rotas manuais
// Route::resource('produtos', ProdutoController::class);

// Pedidos
Route::post('/checkout', [PedidoController::class, 'checkout'])->name('pedidos.checkout');
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');
Route::post('/pedidos/{pedido}/confirmar', [PedidoController::class, 'confirmar'])->name('pedidos.confirmar');
Route::post('/pedidos/{pedido}/cancelar', [PedidoController::class, 'cancelar'])->name('pedidos.cancelar');
