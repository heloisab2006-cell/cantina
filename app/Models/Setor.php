<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setores'; // força o nome correto da tabela
    protected $fillable = ['nome'];

    public function quartos()
    {
        return $this->hasMany(Quarto::class);
    }
}
?>
