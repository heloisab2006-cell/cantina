<?php

namespace App\Http\Controllers;

abstract class Controller
{
 public function limpar()
    {
        // Apaga os produtos salvos na sessão do carrinho
        session()->forget('carrinho');
        
        // Retorna para a página com o contador zerado
        return redirect()->back();
    }
}
