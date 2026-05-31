<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Teste Cantina</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Cardápio - Teste</h1>

    <h3>Salgados</h3>
    <div class="row">
        @foreach($salgados as $produto)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text">{{ $produto->descricao }}</p>
                        <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h3>Doces</h3>
    <div class="row">
        @foreach($doces as $produto)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text">{{ $produto->descricao }}</p>
                        <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h3>Bebidas</h3>
    <div class="row">
        @foreach($bebidas as $produto)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text">{{ $produto->descricao }}</p>
                        <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr>
    <h4>Carrinho</h4>
    <p>Total de itens: {{ $totalItens }}</p>
    <p>Valor total: R$ {{ number_format($valorTotal, 2, ',', '.') }}</p>

</body>
</html>
