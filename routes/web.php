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
Route::get('/api/quartos/{setor}', function($setorId) {
    return \App\Models\Quarto::where('setor_id', $setorId)->get();
});
Route::get('/produtos/gerenciar', [ProdutoController::class, 'gerenciar'])->name('produtos.gerenciar');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
Route::get('/produtos/gerenciar', [ProdutoController::class, 'gerenciar'])->name('produtos.gerenciar');


Route::resource('produtos', ProdutoController::class);
Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');

// checkout de pedidos → nome único
Route::post('/checkout', [PedidoController::class, 'checkout'])->name('pedidos.checkout');

// listagem de pedidos
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');
Route::post('/pedidos/{pedido}/confirmar', [PedidoController::class, 'confirmar'])->name('pedidos.confirmar');
Route::post('/pedidos/{pedido}/cancelar', [PedidoController::class, 'cancelar'])->name('pedidos.cancelar');

?>


