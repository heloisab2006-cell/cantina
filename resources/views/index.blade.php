@extends('layouts.app') {{-- usa o mesmo layout base do cliente --}}

@section('content')
<div class="container my-4">
    <h2 class="fw-bold text-center mb-4">📋 Lista de Pedidos</h2>

    <div class="row">
        @foreach($pedidos as $pedido)
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg">
                    <div class="card-header bg-warning fw-bold">
                        Pedido #{{ $pedido->id }} — {{ $pedido->created_at->format('d/m/Y H:i') }}
                    </div>
                    <div class="card-body">
                        <p><strong>Cliente:</strong> {{ $pedido->nome }} (CPF: {{ $pedido->cpf }})</p>
                        <p><strong>Setor:</strong> {{ $pedido->setor->nome }}</p>
                        <p><strong>Quarto:</strong> {{ $pedido->quarto->numero }}</p>

                        <hr>
                        <h6 class="fw-bold">Itens:</h6>
                        <ul class="list-group list-group-flush">
                            @foreach($pedido->itens as $item)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ $item->quantidade }}x {{ $item->nome }}</span>
                                    <span>R$ {{ number_format($item->preco * $item->quantidade, 2, ',', '.') }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <h5 class="fw-bold text-success mt-3">
                            Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
