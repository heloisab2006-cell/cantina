<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        $total = 0;

        foreach ($carrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        return view('carrinho.index', compact('carrinho', 'total'));
    }

    public function adicionar(Request $request)
    {
        $produto = Produto::findOrFail($request->id);
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produto->id])) {
            $carrinho[$produto->id]['quantidade']++;
        } else {
            $carrinho[$produto->id] = [
                "nome" => $produto->nome,
                "quantidade" => 1,
                "preco" => $produto->preco,
                "imagem" => $produto->imagem
            ];
        }

        session()->put('carrinho', $carrinho);
        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function remover($id)
    {
        $carrinho = session()->get('carrinho', []);
        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
            session()->put('carrinho', $carrinho);
        }

        // Volta para a página anterior (cantina.blade.php)
        return redirect()->back()->with('success', 'Item removido do carrinho!');
    }



    public function atualizar(Request $request, $id)
    {
        $carrinho = session()->get('carrinho', []);
        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade'] = $request->quantidade;
            session()->put('carrinho', $carrinho);
        }

        // Volta para a página anterior (cantina.blade.php)
        return redirect()->back()->with('success', 'Quantidade atualizada!');
    }

    public function checkout(Request $request)
    {
        // Validação dos dados do cliente
        $validated = $request->validate([
            'nome' => 'required|string|min:5',
            'cpf' => 'required|digits:11',
            'setor' => 'required|string',
            'quarto' => 'required|string',
        ]);

        // Recupera o carrinho da sessão
        $carrinho = session()->get('carrinho', []);
        if (empty($carrinho)) {
            return redirect()->back()->with('error', 'Seu carrinho está vazio!');
        }

        // Aqui você pode salvar o pedido no banco
        // Exemplo:
        // Pedido::create([
        //     'nome' => $validated['nome'],
        //     'cpf' => $validated['cpf'],
        //     'setor' => $validated['setor'],
        //     'quarto' => $validated['quarto'],
        //     'itens' => json_encode($carrinho),
        //     'total' => collect($carrinho)->sum(fn($item) => $item['preco'] * $item['quantidade']),
        // ]);

        // Limpa o carrinho
        session()->forget('carrinho');

        return redirect()->back()->with('success', 'Pedido realizado com sucesso!');
    }


}
?>