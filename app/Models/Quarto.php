<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    protected $table = 'quartos'; // força o nome correto da tabela
    protected $fillable = ['numero', 'setor_id'];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}
?>

