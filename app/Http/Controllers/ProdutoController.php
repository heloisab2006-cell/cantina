<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Exibe o cardápio agrupado por categoria e o carrinho
     */

    public function index()
    {
        $salgados = Produto::where('categoria', 'salgados')->get();
        $doces = Produto::where('categoria', 'doces')->get();
        $bebidas = Produto::where('categoria', 'bebidas')->get();

        $carrinho = session()->get('carrinho', []);
        $totalItens = 0;
        $valorTotal = 0;

        foreach ($carrinho as $item) {
            $totalItens += $item['quantidade'];
            $valorTotal += $item['preco'] * $item['quantidade'];
        }

        return view('cantina', compact('salgados', 'doces', 'bebidas', 'totalItens', 'valorTotal'));
    }


    /**
     * CRUD de produtos (admin)
     */
    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'nullable|string|max:255',
            'categoria' => 'required|string|max:100'
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.show', compact('produto'));
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'nullable|string|max:255',
            'categoria' => 'required|string|max:100'
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
