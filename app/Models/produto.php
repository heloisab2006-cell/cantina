<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Informa ao Laravel o nome exato da tabela no Workbench
    protected $table = 'produtos';

    // Permite a inserção de dados em massa nessas colunas
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
        'categoria'
    ];
}