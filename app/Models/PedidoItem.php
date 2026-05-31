<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $fillable = ['pedido_id','nome','quantidade','preco'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}

