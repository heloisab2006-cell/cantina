<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = [
            [
                'nome' => 'SANDUÍCHE DE FRANGO',
                'descricao' => 'Sanduíche de frango com maionese',
                'preco' => 5.00,
                'imagem' => 'img/sanduichefrango.jpg',
                'categoria' => 'salgados'
            ],
            [
                'nome' => 'PÃO DE QUEIJO',
                'descricao' => '6 unidades de pão de queijo',
                'preco' => 5.00,
                'imagem' => 'img/paoqueijo.jpg',
                'categoria' => 'salgados'
            ],
            [
                'nome' => 'CROISSANT',
                'descricao' => '1 unidade de croissant de peito de peru',
                'preco' => 9.00,
                'imagem' => 'img/cro.jpg',
                'categoria' => 'salgados'
            ],
            [
                'nome' => 'PASTEL',
                'descricao' => '1 unidade pastel de carne',
                'preco' => 10.00,
                'imagem' => 'img/pastel.jpg',
                'categoria' => 'salgados'
            ],
            [
                'nome' => 'BROWNIE DE CHOCOLATE',
                'descricao' => 'Brownie de chocolate preto',
                'preco' => 7.00,
                'imagem' => 'img/brownie.jpg',
                'categoria' => 'doces'
            ],
            [
                'nome' => 'COOKIE',
                'descricao' => 'Cookie gourmet tradicional',
                'preco' => 3.50,
                'imagem' => 'img/cookie.jpg',
                'categoria' => 'doces'
            ],
            [
                'nome' => 'BOLO DE POTE',
                'descricao' => 'Bolo de pote de chocolate com leite ninho e morangos',
                'preco' => 13.00,
                'imagem' => 'img/bolopote.jpg',
                'categoria' => 'doces'
            ],
            [
                'nome' => 'GUARANÁ',
                'descricao' => 'Guaraná 220ml',
                'preco' => 6.00,
                'imagem' => 'img/guarana220.jpg',
                'categoria' => 'bebidas'
            ],
            [
                'nome' => 'COCA COLA LATA',
                'descricao' => 'Coca-cola 220ml',
                'preco' => 5.00,
                'imagem' => 'img/coca220.jpg',
                'categoria' => 'bebidas'
            ],
            [
                'nome' => 'SUCO DE LARANJA',
                'descricao' => 'Suco de laranja natural',
                'preco' => 7.00,
                'imagem' => 'img/sucolaranja.jpg',
                'categoria' => 'bebidas'
            ],
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
