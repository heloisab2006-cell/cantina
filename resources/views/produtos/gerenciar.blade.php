<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Produtos - Hospital Maice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <div class="container py-3">
        <!-- Cabeçalho fixo -->
        <div class="sticky-top bg-white shadow-sm p-3 mb-4">
            <h1 class="text-center fw-bold text-secondary">🍴 Gerenciar Produtos</h1>
            <nav class="d-flex justify-content-around mt-3">
                <a href="{{ route('produtos.gerenciar') }}" class="btn btn-outline-secondary btn-sm">Todos</a>
                <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                    data-bs-target="#createProdutoModal">Novo</button>
                <a href="{{ route('produtos.index') }}" class="btn btn-outline-primary btn-sm">Cantina</a>
            </nav>
        </div>

        <!-- Lista de Produtos -->
        @foreach($produtos as $produto)
            <div class="d-flex align-items-center justify-content-between border-bottom py-2">
                <div class="d-flex align-items-center gap-3 flex-grow-1">
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}"
                        class="rounded img-thumbnail" style="width:70px;height:70px;object-fit:cover;">

                    <div>
                        <div class="fw-bold text-uppercase">{{ $produto->nome }}</div>
                        <div class="text-muted small">{{ $produto->descricao }}</div>
                        <div class="text-success fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
                        <span class="badge bg-info text-dark">{{ $produto->categoria }}</span>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary btn-lg rounded" data-bs-toggle="modal"
                        data-bs-target="#editProdutoModal{{ $produto->id }}">
                        ✏️
                    </button>
                    <button class="btn btn-danger btn-lg rounded" data-bs-toggle="modal"
                        data-bs-target="#deleteProdutoModal{{ $produto->id }}">
                        🗑
                    </button>
                </div>
            </div>

            @include('partials.produto_edit_modal', ['produto' => $produto])
            @include('partials.produto_delete_modal', ['produto' => $produto])
        @endforeach
    </div>

    <!-- Rodapé fixo -->
    <div class="fixed-bottom bg-success text-white py-1">
        <div class="container-fluid">
            <div class="d-flex text-center">
                <div class="flex-fill">
                    <a href="{{ route('produtos.index') }}" class="btn text-white d-block w-100">
                        <div class="d-flex flex-column align-items-center">
                            <span class="fs-4">🍴</span>
                            <strong>Cantina</strong>
                        </div>
                    </a>
                </div>
                <div class="border-start border-white"></div>
                <div class="flex-fill">
                    <a href="{{ route('produtos.gerenciar') }}" class="btn text-white d-block w-100">
                        <div class="d-flex flex-column align-items-center">
                            <span class="fs-4">⚙️</span>
                            <strong>Gerenciar</strong>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.produto_create_modal')

</body>

</html>