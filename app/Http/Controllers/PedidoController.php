<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoItem;

class PedidoController extends Controller
{

    //Certifica se os dados do clientes está sendo salvo
    public function salvarDados(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => ['required', 'regex:/^[0-9]{11}$/'],
            'setor' => 'required|exists:setores,id',
            'quarto' => 'required|exists:quartos,id',
        ]);

        session([
            'nomeCliente' => $request->nome,
            'cpfCliente' => $request->cpf,
            'setorSelecionado' => $request->setor,
            'quartoSelecionado' => $request->quarto,
        ]);

        return redirect()->back()->with('success', 'Dados salvos com sucesso!');
    }

    //Finalização do carrinho para o Pedido
    public function checkout(PedidoRequest $request)
    {
        // Dados validados pelo PedidoRequest
        $validated = $request->validated();

        // Recupera carrinho da sessão / Valida se o carrinho estiver vazio
        $carrinho = session()->get('carrinho', []);
        if (empty($carrinho)) {
            return redirect()->back()->withErrors(['carrinho' => 'O carrinho deve ter pelo menos um item.']);
        }

        // Calcula total    
        $total = collect($carrinho)->sum(fn($item) => $item['preco'] * $item['quantidade']);

        // Cria o pedido
        $pedido = Pedido::create([
            'nome' => $validated['nome'],
            'cpf' => $validated['cpf'],
            'setor_id' => $validated['setor'],
            'quarto_id' => $validated['quarto'],
            'total' => $total,
            'status' => 'feito',
        ]);

        // Cria os itens vinculados ao pedido
        foreach ($carrinho as $item) {
            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'nome' => $item['nome'],
                'quantidade' => $item['quantidade'],
                'preco' => $item['preco'],
            ]);
        }

        // Limpa carrinho
        session()->forget('carrinho');

        return redirect()->route('produtos.index')->with('success', 'Pedido realizado com sucesso!');
    }

    //Categoria do Pedido listando-o
    public function index()
    {
        // Pedidos em andamento
        $pedidosFeitos = Pedido::with(['itens', 'setor', 'quarto'])
            ->where('status', 'feito')
            ->latest()
            ->get();

        // Pedidos finalizados
        $pedidosFinalizados = Pedido::with(['itens', 'setor', 'quarto'])
            ->where('status', 'finalizado')
            ->latest()
            ->get();

        // Pedidos cancelados
        $pedidosCancelados = Pedido::with(['itens', 'setor', 'quarto'])
            ->where('status', 'cancelado')
            ->latest()
            ->get();

        return view('pedidos.index', compact('pedidosFeitos', 'pedidosFinalizados', 'pedidosCancelados'));
    }

    //Mostra os detalhes do pedido
    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }


    //Muda os status do carrinho para finalizado
    public function confirmar(Pedido $pedido)
    {
        $pedido->status = 'finalizado';
        $pedido->save();

        return redirect()->route('pedidos.index')->with('success', 'Pedido confirmado com sucesso!');
    }

    //Muda os status do carrinho para cancelado
    public function cancelar(Pedido $pedido)
    {
        $pedido->status = 'cancelado';
        $pedido->save();

        return redirect()->route('pedidos.index')->with('error', 'Pedido cancelado.');
    }

    
}
