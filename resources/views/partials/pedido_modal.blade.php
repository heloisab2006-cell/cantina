<!-- Modal Detalhes do Pedido -->
<div class="modal fade" id="pedidoModal{{ $pedido->id }}" tabindex="-1"
    aria-labelledby="pedidoModalLabel{{ $pedido->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="pedidoModalLabel{{ $pedido->id }}">Detalhes do Pedido #{{ $pedido->id }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Cliente:</strong> {{ $pedido->nome }}</p>
                <p><strong>CPF:</strong> {{ $pedido->cpf }}</p>
                <p><strong>Setor:</strong> {{ $pedido->setor->nome ?? '---' }}</p>
                <p><strong>Quarto:</strong> {{ $pedido->quarto->numero ?? '---' }}</p>

                <hr>
                <h6 class="fw-bold">Itens:</h6>
                @foreach($pedido->itens as $item)
                    <p>{{ $item->quantidade }}x {{ $item->nome }} —
                        R$ {{ number_format($item->preco * $item->quantidade, 2, ',', '.') }}</p>
                @endforeach

                <h5 class="fw-bold text-success mt-3">
                    Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}
                </h5>
            </div>
            <div class="modal-footer">
                <form action="{{ route('pedidos.confirmar', $pedido->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success">Confirmar Pedido ✅</button>
                </form>

                <form action="{{ route('pedidos.cancelar', $pedido->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cancelar Pedido ❌</button>
                </form>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>