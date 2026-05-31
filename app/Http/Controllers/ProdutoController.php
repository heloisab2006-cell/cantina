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
        $doces = Produto::where('categoria', 'doces')->get();
        $bebidas = Produto::where('categoria', 'bebidas')->get();

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

        // Recupera dados do cliente da sessão
        $nomeCliente = session('nomeCliente');
        $cpfCliente = session('cpfCliente');
        $setorSelecionado = session('setorSelecionado') ? Setor::find(session('setorSelecionado')) : null;
        $quartoSelecionado = session('quartoSelecionado') ? Quarto::find(session('quartoSelecionado')) : null;

        return view('cantina', compact(
            'salgados',
            'doces',
            'bebidas',
            'totalItens',
            'valorTotal',
            'setores',
            'setorSelecionado',
            'quartoSelecionado',
            'nomeCliente',
            'cpfCliente'
        ));

    }

    /**
     * CRUD de Produtos
     */
    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:500',
            'preco' => 'required|numeric|min:0',
            'categoria' => 'required|string|max:50',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $dados = $request->only(['nome', 'descricao', 'preco', 'categoria']);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('produtos', 'public');
            $dados['imagem'] = $path;
        }

        Produto::create($dados);

        return redirect()->route('produtos.gerenciar')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:500',
            'preco' => 'required|numeric|min:0',
            'categoria' => 'required|string|max:50',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $dados = $request->only(['nome', 'descricao', 'preco', 'categoria']);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('produtos', 'public');
            $dados['imagem'] = $path;
        }

        $produto->update($dados);

        return redirect()->route('produtos.gerenciar')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.gerenciar')->with('success', 'Produto excluído com sucesso!');
    }

    /**
     * Exibe a tela de gerenciamento de produtos (CRUD)
     */
    public function gerenciar()
    {
        $produtos = Produto::all();
        return view('produtos.gerenciar', compact('produtos'));
    }
}
