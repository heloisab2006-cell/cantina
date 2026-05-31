<!DOCTYPE html>
<html lang="pt-BR">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos - Hospital Maice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="bg-light">

    <div class="container py-3">
        <!-- Cabeçalho fixo -->
        <div class="sticky-top bg-white shadow-sm p-3 mb-4">
            <h1 class="text-center fw-bold text-secondary">📋 Pedidos - Hospital Maice</h1>
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
                <!-- Botão que abre o modal -->
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
                <!-- Botão que abre o modal -->
                <button type="button" class="btn btn-success btn-lg rounded" data-bs-toggle="modal"
                    data-bs-target="#pedidoFinalizadoModal{{ $pedido->id }}">
                    <b>VER DETALHES</b>
                </button>

                <!-- Inclui o partial do modal -->
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
                <!-- Botão para abrir modal -->
                <button type="button" class="btn btn-danger btn-lg rounded" data-bs-toggle="modal"
                    data-bs-target="#pedidoCanceladoModal{{ $pedido->id }}">
                    <b>VER DETALHES</b>
                </button>



                <!-- Inclui o partial do modal -->

                @include('partials.pedido_cancelado_modal', ['pedido' => $pedido])
            </div>



        @endforeach
    </div>

    <!-- Rodapé -->
    <div class="fixed-bottom bg-success text-white py-2">
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
                    <a href="{{ route('pedidos.index') }}" class="btn text-white d-block w-100">
                        <div class="d-flex flex-column align-items-center">
                            <span class="fs-4">📋</span>
                            <strong>Pedidos</strong>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>