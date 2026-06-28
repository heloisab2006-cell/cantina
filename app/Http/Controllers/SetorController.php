<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index()
    {
        $setores = Setor::with('quartos')->get();
        return view('gerenciador.setores_quartos', compact('setores'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        Setor::create($request->all());

        return redirect()->route('setores.index')->with('success', 'Setor criado com sucesso!');
    }

    public function update(Request $request, Setor $setor)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $setor->update($request->all());

        return redirect()->route('setores.index')->with('success', 'Setor atualizado com sucesso!');
    }

    public function destroy(Setor $setor)
    {
        $setor->delete();

        return redirect()->route('setores.index')->with('success', 'Setor removido com sucesso!');
    }
}
