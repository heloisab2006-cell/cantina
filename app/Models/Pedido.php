<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['nome','cpf','setor_id','quarto_id','total'];

    public function itens()
    {
        return $this->hasMany(PedidoItem::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function quarto()
    {
        return $this->belongsTo(Quarto::class);
    }
}

