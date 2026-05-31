<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    //Retornar o carrinho de pedidos
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        $total = 0;

        foreach ($carrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        return view('carrinho.index', compact('carrinho', 'total'));
    }

    //Busca o Produto pelo ID, se existir aumenta a quantidade
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

        return redirect()->back()->with('success', 'Item removido do carrinho!');
    }



    public function atualizar(Request $request, $id)
    {
        $carrinho = session()->get('carrinho', []);
        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade'] = $request->quantidade;
            session()->put('carrinho', $carrinho);
        }

        return redirect()->back()->with('success', 'Quantidade atualizada!');
    }


    //Valida os dados, verifica se tem item no carrinhos
    public function checkout(PedidoRequest $request)

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

        // Limpa o carrinho
        session()->forget('carrinho');

        return redirect()->back()->with('success', 'Pedido realizado com sucesso!');
    }
    public function salvarDados(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:5',
            'cpf' => ['required', 'regex:/^[0-9]{11}$/'],
            'setor' => 'required|exists:setores,id',
            'quarto' => 'required|exists:quartos,id',
        ]);

        // Guardar na sessão
        session([
            'nomeCliente' => $request->nome,
            'cpfCliente' => $request->cpf,
            'setorSelecionado' => $request->setor,
            'quartoSelecionado' => $request->quarto,
        ]);

        return redirect()->route('produtos.index')->with('success', 'Dados salvos com sucesso!');
    }


}
?>