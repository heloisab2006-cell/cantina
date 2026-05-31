<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Setor;
use App\Models\Quarto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Exibe o cardápio agrupado por categoria e o carrinho
     */
   public function index()
{
    $salgados = Produto::where('categoria', 'salgados')->get();
    $doces    = Produto::where('categoria', 'doces')->get();
    $bebidas  = Produto::where('categoria', 'bebidas')->get();

    $carrinho = session()->get('carrinho', []);
    $totalItens = 0;
    $valorTotal = 0;

    foreach ($carrinho as $item) {
        $totalItens += $item['quantidade'];
        $valorTotal += $item['preco'] * $item['quantidade'];
    }

    $setores = Setor::with('quartos')->get();

    // Recupera setor e quarto escolhidos (se existirem)
    $setorSelecionado = null;
    $quartoSelecionado = null;

    if (old('setor')) {
        $setorSelecionado = Setor::find(old('setor'));
    }
    if (old('quarto')) {
        $quartoSelecionado = Quarto::find(old('quarto'));
    }

    return view('cantina', compact(
        'salgados',
        'doces',
        'bebidas',
        'totalItens',
        'valorTotal',
        'setores',
        'setorSelecionado',
        'quartoSelecionado'
    ));
}

}
