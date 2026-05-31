<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina - Hospital Maice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <div class="container py-3">
        <!-- Cabeçalho fixo -->
        <div class="sticky-top bg-white shadow-sm p-3 mb-4">
            <h1 class="text-center fw-bold text-secondary">Cantina - Hospital Maice</h1>
            <nav class="d-flex justify-content-around mt-3">
                <a href="#secao-salgados" class="btn btn-outline-secondary btn-sm">Salgados</a>
                <a href="#secao-doces" class="btn btn-outline-secondary btn-sm">Doces</a>
                <a href="#secao-bebidas" class="btn btn-outline-secondary btn-sm">Bebidas</a>
            </nav>
        </div>

        <!-- Salgados -->
        <h2 id="secao-salgados" class="text-success fw-bold text-uppercase mt-4">Salgados</h2>
        @foreach($salgados as $produto)
            <form action="{{ route('carrinho.adicionar') }}" method="POST"
                class="d-flex align-items-center justify-content-between border-bottom py-2">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                <div class="d-flex align-items-center gap-3 flex-grow-1">
                    <img src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" class="rounded"
                        style="width:70px;height:70px;object-fit:cover;">
                    <div>
                        <div class="fw-bold text-uppercase">{{ $produto->nome }}</div>
                        <div class="text-muted small">{{ $produto->descricao }}</div>
                        <div class="text-success fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-lg rounded">+</button>
            </form>
        @endforeach

        <!-- Doces -->
        <h2 id="secao-doces" class="text-success fw-bold text-uppercase mt-4">Doces</h2>
        @foreach($doces as $produto)
            <form action="{{ route('carrinho.adicionar') }}" method="POST"
                class="d-flex align-items-center justify-content-between border-bottom py-2">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                <div class="d-flex align-items-center gap-3 flex-grow-1">
                    <img src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" class="rounded"
                        style="width:70px;height:70px;object-fit:cover;">
                    <div>
                        <div class="fw-bold text-uppercase">{{ $produto->nome }}</div>
                        <div class="text-muted small">{{ $produto->descricao }}</div>
                        <div class="text-success fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-lg rounded">+</button>
            </form>
        @endforeach

        <!-- Bebidas -->
        <h2 id="secao-bebidas" class="text-success fw-bold text-uppercase mt-4">Bebidas</h2>
        @foreach($bebidas as $produto)
            <form action="{{ route('carrinho.adicionar') }}" method="POST"
                class="d-flex align-items-center justify-content-between border-bottom py-2">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                <div class="d-flex align-items-center gap-3 flex-grow-1">
                    <img src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" class="rounded"
                        style="width:70px;height:70px;object-fit:cover;">
                    <div>
                        <div class="fw-bold text-uppercase">{{ $produto->nome }}</div>
                        <div class="text-muted small">{{ $produto->descricao }}</div>
                        <div class="text-success fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-lg rounded">+</button>
            </form>
        @endforeach
    </div>

    <!-- Rodapé carrinho -->
    <div class="fixed-bottom bg-success text-white d-flex justify-content-between align-items-center px-3 py-2">
        <button id="btn-usuario" class="btn btn-link text-white">👤 Meus Dados</button>

        <!-- Botão abre modal -->
        <button id="btn-ver-carrinho" class="btn btn-link text-white position-relative" data-bs-toggle="modal"
            data-bs-target="#carrinhoModal">
            🛒 Ver Itens
            <span class="badge bg-warning text-dark position-absolute top-0 start-100 translate-middle">
                {{ count(session('carrinho', [])) }}
            </span>
        </button>


        <button id="btn-finalizar-compra" class="btn btn-warning fw-bold" data-bs-toggle="modal"
            data-bs-target="#checkoutModal">
            🚀 Fazer Pedido
        </button>
    </div>

    <!-- Modal Checkout -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title fw-bold" id="checkoutModalLabel">🚀 Finalizar Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('carrinho.checkout') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nome Completo</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">CPF</label>
                            <input type="text" name="cpf" class="form-control" maxlength="11" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Setor</label>
                            <input type="text" name="setor" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quarto</label>
                            <input type="text" name="quarto" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar Pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Carrinho -->
    <div class="modal fade" id="carrinhoModal" tabindex="-1" aria-labelledby="carrinhoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="carrinhoModalLabel">🛒 Meu Carrinho</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-light">
                    @php
                        $carrinho = session()->get('carrinho', []);
                        $total = 0;
                    @endphp

                    @if(empty($carrinho))
                        <div class="alert alert-warning text-center">
                            Seu carrinho está vazio 😕
                        </div>
                    @else
                        <div class="row">
                            @foreach($carrinho as $id => $item)
                                @php $total += $item['preco'] * $item['quantidade']; @endphp
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title fw-bold">{{ $item['nome'] }}</h6>
                                            <p class="text-muted mb-1">Qtd: {{ $item['quantidade'] }}</p>
                                            <p class="text-success fw-bold mb-2">
                                                R$ {{ number_format($item['preco'] * $item['quantidade'], 2, ',', '.') }}
                                            </p>
                                            <div class="mt-auto d-flex justify-content-between">
                                                <form action="{{ route('carrinho.atualizar', $id) }}" method="POST"
                                                    class="d-flex">
                                                    @csrf
                                                    <input type="number" name="quantidade" value="{{ $item['quantidade'] }}"
                                                        min="1" class="form-control form-control-sm w-50">
                                                    <button type="submit" class="btn btn-primary btn-sm ms-2">↻</button>
                                                </form>
                                                <form action="{{ route('carrinho.remover', $id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">✖</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="modal-footer d-flex justify-content-between bg-white">
                    <h5 class="fw-bold text-success mb-0">Total: R$ {{ number_format($total, 2, ',', '.') }}</h5>
                    <button class="btn btn-success btn-lg">🚀 Finalizar Pedido</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>