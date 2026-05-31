<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Informa ao Laravel o nome exato da tabela
    protected $table = 'produtos';

    // Permite a inserção de dados em massa nessas colunas
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
        'categoria',
    ];

    // Caso queira trabalhar com casts automáticos
    protected $casts = [
        'preco' => 'decimal:2',
    ];
}
