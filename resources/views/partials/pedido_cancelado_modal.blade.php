<!-- Modal Detalhes do Pedido Cancelado -->
<div class="modal fade" id="pedidoCanceladoModal{{ $pedido->id }}" tabindex="-1" aria-labelledby="pedidoCanceladoModalLabel{{ $pedido->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="pedidoCanceladoModalLabel{{ $pedido->id }}">
                    Pedido Cancelado #{{ $pedido->id }}
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

                <h5 class="fw-bold text-danger mt-3">
                    Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}
                </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>