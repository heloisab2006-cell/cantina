<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CantinaController extends Controller
{
    public function index()
    {
        // 1. LISTA DE SALGADOS
        $salgados = collect([
            (object)[
                'id' => 1,
                'nome' => 'SANDUÍCHE DE FRANGO',
                'descricao' => 'Sanduíche de frango com maionese',
                'preco' => 5.00,
                'imagem' => asset('img/sanduichefrango.jpg')
            ],
            (object)[
                'id' => 2,
                'nome' => 'PÃO DE QUEIJO',
                'descricao' => '6 unidades de pão de queijo',
                'preco' => 5.00,
                'imagem' => asset('img/paoqueijo.jpg')
            ]
        ]);

        // 2. LISTA DE DOCES (Movido para dentro da função index)
        $doces = collect([
            (object)[
                'id' => 3,
                'nome' => 'BROWNIE DE CHOCOLATE',
                'descricao' => 'Brownie de chocolate preto',
                'preco' => 7.00,
                'imagem' => asset('img/brownie.jpg') // Ajustado para a pasta img/
            ],
            (object)[
                'id' => 4,
                'nome' => 'COOKIE',
                'descricao' => 'Cookie gourmet tradicional',
                'preco' => 3.50,
                'imagem' => asset('img/cookie.jpg') // Ajustado para a pasta img/
            ]
        ]);

        // 3. LISTA DE BEBIDAS (Movido para dentro da função index)
        $bebidas = collect([
            (object)[
                'id' => 5,
                'nome' => 'GUARANÁ',
                'descricao' => 'Guarana 220ml',
                'preco' => 6.00,
                'imagem' => asset('img/guarana220.jpg') // Ajustado para a pasta img/
            ],
            (object)[
                'id' => 6,
                'nome' => 'COCA COLA LATA',
                'descricao' => 'Coca-cola 220ml',
                'preco' => 5.00,
                'imagem' => asset('img/coca220.jpg') // Ajustado para a pasta img/
            ]
        ]);

        // Gerenciamento unificado do carrinho na sessão
        $carrinho = session()->get('carrinho', []);
        $totalItens = 0;
        $valorTotal = 0;

        foreach ($carrinho as $item) {
            $totalItens += $item['quantidade'];
            $valorTotal += $item['preco'] * $item['quantidade'];
        }

        // Retorna a view única com todas as variáveis integradas
        return view('cantina', compact('salgados', 'doces', 'bebidas', 'totalItens', 'valorTotal'));
    }

    public function adicionar(Request $request)
    {
        $id = $request->input('id');
        $nome = $request->input('name');
        $preco = (float) $request->input('price');

        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
        } else {
            $carrinho[$id] = [
                "nome" => $nome,
                "preco" => $preco,
                "quantidade" => 1
            ];
        }

        session()->put('carrinho', $carrinho);
        return redirect()->back();
    }

    public function limpar()
    {
        session()->forget('carrinho');
        return redirect()->back();
    }

        public function remover(Request $request)
    {
        $id = $request->input('id');
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            // Se tiver mais de 1 unidade, apenas diminui a quantidade
            if ($carrinho[$id]['quantidade'] > 1) {
                $carrinho[$id]['quantidade']--;
            } else {
                // Se tiver só 1 unidade, remove o produto totalmente do carrinho
                unset($carrinho[$id]);
            }
        }

        session()->put('carrinho', $carrinho);
        return redirect()->back();
    }
}