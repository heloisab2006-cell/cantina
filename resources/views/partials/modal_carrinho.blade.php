<!-- Modal Carrinho -->
<div class="modal fade" id="carrinhoModal" tabindex="-1" aria-labelledby="carrinhoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="carrinhoModalLabel">Meu Carrinho</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light">
                @php
                    $carrinho = session()->get('carrinho', []);
                    $total = 0;
                @endphp

                @if(empty($carrinho))
                    <div class="alert alert-warning text-center">Seu carrinho está vazio</div>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Qtd</th>
                                <th>Preço</th>
                                <th>Total</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carrinho as $id => $item)
                                @php $total += $item['preco'] * $item['quantidade']; @endphp
                                <tr>
                                    <td>{{ $item['nome'] }}</td>
                                    <td>
                                        <form action="{{ route('carrinho.atualizar', $id) }}" method="POST" class="d-flex">
                                            @csrf
                                            <input type="number" name="quantidade" value="{{ $item['quantidade'] }}" min="1"
                                                class="form-control form-control-sm w-50">
                                            <button type="submit" class="btn btn-primary btn-sm ms-2">↻</button>
                                        </form>
                                    </td>
                                    <td>R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                                    <td>R$ {{ number_format($item['preco'] * $item['quantidade'], 2, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('carrinho.remover', $id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">✖</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5 class="fw-bold text-success">Total: R$ {{ number_format($total, 2, ',', '.') }}</h5>
                @endif
            </div>
        </div>
    </div>
</div>