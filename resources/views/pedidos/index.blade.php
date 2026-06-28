@extends('layouts.app')

@section('title', 'Pedidos - Hospital Maice')

@section('content')
    <div class="container py-3">
        <!-- Cabeçalho fixo -->
        <div class="sticky-top bg-white shadow-sm p-3 mb-4">
            <h1 class="text-center fw-bold text-secondary">Pedidos - Hospital Maice</h1>
            <nav class="d-flex justify-content-around mt-3">
                <a href="#secao-feitos" class="btn btn-outline-primary btn-sm">Pedidos Feitos</a>
                <a href="#secao-finalizados" class="btn btn-outline-success btn-sm">Pedidos Finalizados</a>
                <a href="#secao-cancelados" class="btn btn-outline-danger btn-sm">Pedidos Cancelados</a>
            </nav>
        </div>

        <!-- Pedidos Feitos -->
        <h2 id="secao-feitos" class="text-primary fw-bold text-uppercase mt-4">Pedidos Feitos</h2>
        @foreach($pedidosFeitos as $pedido)
            <div class="d-flex align-items-center justify-content-between border-bottom py-2">
                <div class="flex-grow-1">
                    <div class="fw-bold">Pedido #{{ $pedido->id }} — {{ $pedido->nome }}</div>
                    <div class="text-muted small">CPF: {{ $pedido->cpf }}</div>
                    <div class="text-primary fw-bold">Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}</div>
                </div>
                <button type="button" class="btn btn-primary btn-lg rounded" data-bs-toggle="modal"
                    data-bs-target="#pedidoModal{{ $pedido->id }}">
                    <b>VER DETALHES</b>
                </button>
                @include('partials.pedido_modal', ['pedido' => $pedido])
            </div>
        @endforeach

        <!-- Pedidos Finalizados -->
        <h2 id="secao-finalizados" class="text-success fw-bold text-uppercase mt-4">Pedidos Finalizados</h2>
        @foreach($pedidosFinalizados as $pedido)
            <div class="d-flex align-items-center justify-content-between border-bottom py-2">
                <div class="flex-grow-1">
                    <div class="fw-bold">Pedido #{{ $pedido->id }} — {{ $pedido->nome }}</div>
                    <div class="text-muted small">CPF: {{ $pedido->cpf }}</div>
                    <div class="text-success fw-bold">Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}</div>
                </div>
                <button type="button" class="btn btn-success btn-lg rounded" data-bs-toggle="modal"
                    data-bs-target="#pedidoFinalizadoModal{{ $pedido->id }}">
                    <b>VER DETALHES</b>
                </button>
                @include('partials.pedido_finalizado_modal', ['pedido' => $pedido])
            </div>
        @endforeach

        <!-- Pedidos Cancelados -->
        <h2 id="secao-cancelados" class="text-danger fw-bold text-uppercase mt-4">Pedidos Cancelados</h2>
        @foreach($pedidosCancelados as $pedido)
            <div class="d-flex align-items-center justify-content-between border-bottom py-2">
                <div class="flex-grow-1">
                    <div class="fw-bold">Pedido #{{ $pedido->id }} — {{ $pedido->nome }}</div>
                    <div class="text-muted small">CPF: {{ $pedido->cpf }}</div>
                    <div class="text-danger fw-bold">Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}</div>
                </div>
                <button type="button" class="btn btn-danger btn-lg rounded" data-bs-toggle="modal"
                    data-bs-target="#pedidoCanceladoModal{{ $pedido->id }}">
                    <b>VER DETALHES</b>
                </button>
                @include('partials.pedido_cancelado_modal', ['pedido' => $pedido])
            </div>
        @endforeach
    </div>

    <!-- Rodapé -->
    <div class="sticky-bottom bg-success text-white py-2">
        <div class="container-fluid">
            <div class="d-flex text-center">
                <div class="flex-fill">
                    <a href="{{ route('produtos.index') }}" class="btn text-white d-block w-100">
                        <div class="d-flex flex-column align-items-center">
                            <span class="fs-4">🍴</span>
                            <strong>CANTINA</strong>
                        </div>
                    </a>
                </div>
                <div class="border-start border-white"></div>
                <div class="flex-fill">
                    <a href="{{ route('produtos.gerenciar') }}" class="btn text-white d-block w-100">
                        <div class="d-flex flex-column align-items-center">
                            <span class="fs-4">⚙️</span>
                            <strong>GERENCIAR</strong>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
