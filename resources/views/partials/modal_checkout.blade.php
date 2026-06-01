<!-- Modal Fazer Pedido -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-warning">
                <h5 class="modal-title fw-bold" id="checkoutModalLabel">Resumo do Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h6 class="fw-bold">Cliente:</h6>
                <p>Nome: {{ old('nome') ?? $nomeCliente ?? '---' }}</p>
                <p>CPF: {{ old('cpf') ?? $cpfCliente ?? '---' }}</p>
                <p>Setor: {{ $setorSelecionado->nome ?? '---' }}</p>
                <p>Quarto: {{ $quartoSelecionado->numero ?? '---' }}</p>

                <hr>
                <h6 class="fw-bold">Itens:</h6>
                @php
                    $carrinho = session()->get('carrinho', []);
                    $total = 0;
                @endphp
                @foreach($carrinho as $item)
                    @php $total += $item['preco'] * $item['quantidade']; @endphp
                    <p>{{ $item['quantidade'] }}x {{ $item['nome'] }} — R$
                        {{ number_format($item['preco'] * $item['quantidade'], 2, ',', '.') }}
                    </p>
                @endforeach

                <h5 class="fw-bold text-success mt-3">Total: R$ {{ number_format($total, 2, ',', '.') }}</h5>
            </div>
            <div class="modal-footer">
                <form id="checkoutForm" action="{{ route('pedidos.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nome" value="{{ $nomeCliente }}">
                    <input type="hidden" name="cpf" value="{{ $cpfCliente }}">
                    <input type="hidden" name="setor" value="{{ $setorSelecionado->id ?? '' }}">
                    <input type="hidden" name="quarto" value="{{ $quartoSelecionado->id ?? '' }}">

                    <button type="submit" class="btn btn-success btn-lg">Finalizar Pedido ✅</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script de validação -->
<script>
    document.querySelector("#checkoutForm").addEventListener("submit", function (e) {
        let nome = "{{ $nomeCliente ?? '' }}";
        let cpf = "{{ $cpfCliente ?? '' }}";
        let setor = "{{ $setorSelecionado->id ?? '' }}";
        let quarto = "{{ $quartoSelecionado->id ?? '' }}";

        // Verifica se carrinho tem itens
        let carrinhoVazio = {{ empty(session()->get('carrinho', [])) ? 'true' : 'false' }};

        if (!nome || !cpf || !setor || !quarto) {
            alert("Você precisa preencher seus dados primeiro no modal 'Meus Dados'.");
            e.preventDefault();
            return;
        }

        if (!/^\d{11}$/.test(cpf)) {
            alert("O CPF deve conter apenas números e exatamente 11 dígitos.");
            e.preventDefault();
            return;
        }

        if (carrinhoVazio) {
            alert("O carrinho deve ter pelo menos um item.");
            e.preventDefault();
        }
    });
</script>