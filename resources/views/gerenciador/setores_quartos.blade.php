@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Gerenciar Setores e Quartos</h1>

    <!-- Botão para adicionar setor -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAddSetor">
        Adicionar Setor
    </button>

    <!-- Lista de setores -->
    @foreach($setores as $setor)
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <!-- Aqui aparece o nome do setor -->
            <strong>{{ $setor->nome }}</strong>
            <span class="badge bg-secondary">
                {{ $setor->quartos->count() }} quartos
            </span>
        </div>
        <div class="card-body">
            <h6>Quartos</h6>
            <ul>
                @foreach($setor->quartos as $quarto)
                    <li>
                        {{ $quarto->numero }}
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditQuarto{{ $quarto->id }}">Editar</button>
                        <form action="{{ route('quartos.destroy', $quarto->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddQuarto{{ $setor->id }}">
                Adicionar Quarto
            </button>
        </div>
    </div>
@endforeach

</div>
@include('partials.modal_add_setor')
@include('partials.modal_edit_setor')
@include('partials.modal_add_quarto')
@include('partials.modal_edit_quarto')

