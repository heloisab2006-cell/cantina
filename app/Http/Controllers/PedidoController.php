<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoItem;

class PedidoController extends Controller
{

    public function index()
    {

        $pedidosFeitos = Pedido::where('status', 'feito')->get();
        $pedidosFinalizados = Pedido::where('status', 'finalizado')->get();
        $pedidosCancelados = Pedido::where('status', 'cancelado')->get();
        
        return view('pedidos.index', compact('pedidosFeitos', 'pedidosFinalizados', 'pedidosCancelados'));
        // Pedidos em andamento (não finalizados)
        $pedidosFeitos = \App\Models\Pedido::with(['itens', 'setor', 'quarto'])
            ->where('status', 'feito') // ou outro campo que você definiu
            ->latest()
            ->get();

        // Pedidos já finalizados
        $pedidosFinalizados = \App\Models\Pedido::with(['itens', 'setor', 'quarto'])
            ->where('status', 'finalizado') // ou outro campo que você definiu
            ->latest()
            ->get();

        return view('pedidos.index', compact('pedidosFeitos', 'pedidosFinalizados'));

        
    }


    public function checkout(Request $request)
    {

        // Recupera carrinho da sessão
        $carrinho = session()->get('carrinho', []);
        if (empty($carrinho)) {
            return redirect()->back()->with('error', 'Carrinho vazio!');
        }

        // Calcula total
        $total = 0;
        foreach ($carrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        // Cria o pedido já com status "feito"
        $pedido = Pedido::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'setor_id' => $request->setor,
            'quarto_id' => $request->quarto,
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

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function confirmar(Pedido $pedido)
    {
        $pedido->status = 'finalizado';
        $pedido->save();

        return redirect()->route('pedidos.index')->with('success', 'Pedido confirmado com sucesso!');
    }

    public function cancelar(Pedido $pedido)
    {
        $pedido->status = 'cancelado';
        $pedido->save();

        return redirect()->route('pedidos.index')->with('error', 'Pedido cancelado.');
    }



}
