<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use Illuminate\Http\Request;

class QuartoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer',
            'setor_id' => 'required|exists:setores,id'
        ]);

        Quarto::create($request->all());
        return redirect()->route('setores.index')->with('success', 'Quarto criado com sucesso!');
    }


    public function update(Request $request, Quarto $quarto)
    {
        $request->validate([
            'numero' => 'required|string|max:255'
        ]);

        $quarto->update($request->all());
        return redirect()->route('setores.index')->with('success', 'Quarto atualizado!');
    }

    public function destroy(Quarto $quarto)
    {
        $quarto->delete();
        return redirect()->route('setores.index')->with('success', 'Quarto removido!');
    }
}
