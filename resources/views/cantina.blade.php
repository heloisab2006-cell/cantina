<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina - Hospital Maice</title>
    <!-- LINKS OFICIAIS DO BOOTSTRAP (COLE DENTRO DO HEAD) -->
<link href="https://jsdelivr.net" rel="stylesheet">
<script src="https://jsdelivr.net"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .app-container {
            width: 100%;
            max-width: 450px;
            background-color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .fixed-header {
            position: sticky;
            top: 0;
            background-color: #ffffff;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .header-banner {
            width: 100%;
            height: 120px;
            background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('https://placeholder.com') center/cover no-repeat;
            position: relative;
        }

        .logo-container {
            position: absolute;
            bottom: -20px;
            left: 20px;
            width: 70px;
            height: 70px;
            background-color: white;
            border-radius: 12px;
            padding: 5px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-title {
            margin-top: 30px;
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            color: #555;
            letter-spacing: 0.5px;
        }

        .categories-nav {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 15px 10px;
            border-bottom: 1px solid #eee;
        }

        .category-btn {
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            border: none;
            background: transparent;
            color: #555;
            cursor: pointer;
        }

        .category-btn.active {
            background-color: #474747;
            color: white;
        }

        .menu-content {
            padding: 20px;
            flex-grow: 1;
            padding-bottom: 100px;
        }

        .section-title {
            color: #2e7d32;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 25px;
            margin-bottom: 15px;
            scroll-margin-top: 230px !important;
        }

        .product-card {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            width: 100%;
            gap: 15px;
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 1;
        }

        .product-img-box {
            width: 70px !important;
            height: 70px !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0 !important;
        }

        .product-img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }

        .product-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
        }

        .product-name {
            font-size: 14px;
            font-weight: 700;
            color: #000;
            text-transform: uppercase;
        }

        .product-desc {
            font-size: 11px;
            color: #777;
            text-transform: uppercase;
        }

        .product-price {
            font-size: 13px;
            font-weight: 700;
            color: #2e7d32;
        }

        .add-btn {
            background-color: #2e7d32;
            color: white;
            border: none;
            width: 55px;
            height: 70px;
            border-radius: 8px;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

      .footer-cart {
    position: fixed !important; /* MUDOU AQUI: Isso faz a barra flutuar fixa no rodapé do navegador */
    bottom: 0 !important;
    left: 50% !important;
    transform: translateX(-50%) !important; /* Centraliza a barra perfeitamente caso a tela seja grande */
    width: 100%;
    max-width: 450px; /* Trava a barra exatamente na largura do aplicativo */
    height: 55px;
    background-color: #2e7d32;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    color: white;
    font-weight: bold;
    text-decoration: none;
    z-index: 9999 !important; /* MUDOU AQUI: Força a barra verde a ficar na frente de qualquer imagem ou texto */
}


        .user-icon-container {
            display: flex;
            align-items: center;
            position: relative;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        .user-icon { font-size: 24px; }

        .close-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #d32f2f;
            color: white;
            font-size: 9px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .checkout-text {
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cart-icon-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        .cart-icon { font-size: 24px; }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #ff9100;
            color: white;
            font-size: 10px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="app-container">
        <div class="fixed-header">
            <div class="header-banner">
                <div class="logo-container"></div>
            </div>
            <h1 class="main-title">CANTINA - HOSPITAL MAICE</h1>
            
            <nav class="categories-nav">
                <span class="menu-icon">☰</span>
                <a href="#secao-salgados" class="category-btn active" style="text-decoration: none;" onclick="ativarBotao(this)">Salgados</a>
                <a href="#secao-doces" class="category-btn" style="text-decoration: none;" onclick="ativarBotao(this)">Doces</a>
                <a href="#secao-bebidas" class="category-btn" style="text-decoration: none;" onclick="ativarBotao(this)">Bebidas</a>
            </nav>
        </div>

        <main class="menu-content">
            <!-- SEÇÃO DE SALGADOS -->
            <h2 class="section-title" id="secao-salgados">Salgados</h2>    
            @foreach($salgados as $produto)
                <form action="{{ route('carrinho.add') }}" method="POST" class="product-card">
                    @csrf
                    <input type="hidden" name="id" value="{{ $produto->id }}">
                    <input type="hidden" name="name" value="{{ $produto->nome }}">
                    <input type="hidden" name="price" value="{{ $produto->preco }}">
                    
                    <div class="product-info">
                        <div class="product-img-box">
                            <img class="product-img" src="{{ $produto->imagem }}" alt="{{ $produto->nome }}">
                        </div>
                        
                        <div class="product-details">
                            <span class="product-name">{{ $produto->nome }}</span>
                            <span class="product-desc">{{ $produto->descricao }}</span>
                            <span class="product-price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                        </div>
                    </div>
                    <button type="submit" class="add-btn">+</button>
                </form>
            @endforeach

            <!-- SEÇÃO DE DOCES -->
            <h2 class="section-title" id="secao-doces" style="margin-top: 35px;">Doces</h2>    
            @foreach($doces as $produto)
                <form action="{{ route('carrinho.add') }}" method="POST" class="product-card">
                    @csrf
                    <input type="hidden" name="id" value="{{ $produto->id }}">
                    <input type="hidden" name="name" value="{{ $produto->nome }}">
                    <input type="hidden" name="price" value="{{ $produto->preco }}">
                    
                    <div class="product-info">
                        <div class="product-img-box">
                            <img class="product-img" src="{{ $produto->imagem }}" alt="{{ $produto->nome }}">
                        </div>
                        
                        <div class="product-details">
                            <span class="product-name">{{ $produto->nome }}</span>

                    <span class="product-desc">{{ $produto->descricao }}</span>
                    <span class="product-price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                </div>
            </div>
            <button type="submit" class="add-btn">+</button>
        </form>
    @endforeach

    <!-- SEÇÃO DE BEBIDAS (ADICIONADA DE VOLTA) -->
    <h2 class="section-title" id="secao-bebidas" style="margin-top: 35px;">Bebidas</h2>    
    @foreach($bebidas as $produto)
        <form action="{{ route('carrinho.add') }}" method="POST" class="product-card">
            @csrf
            <input type="hidden" name="id" value="{{ $produto->id }}">
            <input type="hidden" name="name" value="{{ $produto->nome }}">
            <input type="hidden" name="price" value="{{ $produto->preco }}">
            
            <div class="product-info">
                <div class="product-img-box">
                    <img class="product-img" src="{{ $produto->imagem }}" alt="{{ $produto->nome }}">
                </div>
                
                <div class="product-details">
                    <span class="product-name">{{ $produto->nome }}</span>
                    <span class="product-desc">{{ $produto->descricao }}</span>
                    <span class="product-price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                </div>
            </div>
            <button type="submit" class="add-btn">+</button>
        </form>
    @endforeach
</main> <!-- Aqui termina o conteúdo principal dos lanches -->

</main> <!-- Aqui termina o conteúdo principal dos lanches -->

<!-- RODAPÉ VERDE (CARRINHO) -->
<a href="?carrinho=aberto" id="btn-footer-cart" class="footer-cart" style="cursor: pointer; text-decoration: none;">
    <div class="user-icon-container">
        <span class="user-icon">👤</span>
    </div>
    
    <div class="checkout-text">
        @if($valorTotal > 0)
            Finalizar Compra (R$ {{ number_format($valorTotal, 2, ',', '.') }})
        @else
            FINALIZAR COMPRA
        @endif
    </div>

    <div class="cart-icon-container">
        <span class="cart-icon">🛒</span>
        <span class="cart-badge">{{ $totalItens }}</span>
    </div>
</a>

</div> <!-- Fecha a div app-container -->

<!-- TELA DO CARRINHO COM DESIGN LIMPO E SUAVE -->
@if(request('carrinho') == 'aberto')
<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.3); z-index: 10000; display: flex; justify-content: center; align-items: center; min-height: 100vh;">
    
    <!-- Caixa branca com cantos arredondados, sem borda preta e com sombra leve -->
    <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; width: 90%; max-width: 400px; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); display: flex; flex-direction: column; max-height: 80vh; z-index: 10001;">
        
        <!-- Cabeçalho do Carrinho -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="color: #2e7d32; font-size: 22px; font-weight: 700; margin: 0; letter-spacing: 0.5px;">CARRINHO</h2>
            <a href="?" class="close-cart-lnk" style="font-size: 22px; text-decoration: none; color: #888; font-weight: bold;">✕</a>
        </div>

        <!-- Lista de Itens vinda da Sessão do Laravel -->
        <div style="overflow-y: auto; flex: 1; margin-bottom: 25px;">
            @php $carrinhoItens = session()->get('carrinho', []); @endphp
            
            @if(count($carrinhoItens) > 0)
                @foreach($carrinhoItens as $id => $item)
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f5f5f5;">
                        <div>
                            <p style="font-size: 14px; font-weight: 700; margin: 0; text-transform: uppercase; color: #222;">{{ $item['nome'] }}</p>
                            <p style="font-size: 12px; color: #999; margin: 2px 0 0 0;">R$ {{ number_format($item['preco'], 2, ',', '.') }}</p>
                        </div>
                        
                        <!-- Quantidade e Botão de Excluir Integrados -->
                        <div style="background-color: #2e7d32; color: white; display: flex; align-items: center; gap: 10px; padding: 6px 14px; border-radius: 20px; font-weight: bold; font-size: 14px;">
                            <!-- Formulário para remover o item -->
                            <form action="{{ route('carrinho.remove') }}" method="POST" style="margin: 0; display: flex; align-items: center;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" style="background: none; border: none; color: white; cursor: pointer; padding: 0; font-size: 14px; display: flex; align-items: center; opacity: 0.8;">
                                    🗑️
                                </button>
                            </form>
                            <span>{{ $item['quantidade'] }}x</span>
                        </div>
                    </div>
                @endforeach
            @else
                <p style="text-align: center; color: #999; padding: 30px; margin: 0; font-size: 14px;">Seu carrinho está vazio.</p>
            @endif
        </div>

        <!-- Botão de Voltar -->
        <div>
            <a href="?" class="close-cart-lnk" style="display: block; width: 100%; background-color: #474747; color: white; text-align: center; padding: 14px; border-radius: 12px; font-weight: bold; text-decoration: none; text-transform: uppercase; font-size: 14px; letter-spacing: 0.5px;">Voltar ao Cardápio</a>
        </div>

    </div>
</div>
@endif

<!-- SCRIPT INTELIGENTE PARA MANTER A SEÇÃO ATIVA NA ROLAGEM -->
<script>
    function ativarBotao(elemento) {
        const botoes = document.querySelectorAll('.category-btn');
        botoes.forEach(btn => btn.classList.remove('active'));
        elemento.classList.add('active');
        localStorage.setItem('ultimaSecao', elemento.getAttribute('href'));
    }

    document.getElementById('btn-footer-cart').addEventListener('click', function(e) {
        const secaoAtual = localStorage.getItem('ultimaSecao') || '#secao-salgados';
        this.setAttribute('href', '?carrinho=aberto' + secaoAtual);
    });

    document.querySelectorAll('.close-cart-lnk').forEach(link => {
        link.addEventListener('click', function(e) {
            const secaoAtual = localStorage.getItem('ultimaSecao') || '#secao-salgados';
            this.setAttribute('href', '?' + secaoAtual);
        });
    });

    window.addEventListener('DOMContentLoaded', () => {
        if (window.location.hash) {
            const linkAtivo = document.querySelector(`.category-btn[href="${window.location.hash}"]`);
            if (linkAtivo) {
                const botoes = document.querySelectorAll('.category-btn');
                botoes.forEach(btn => btn.classList.remove('active'));
                linkAtivo.classList.add('active');
            }
        }
    });
</script>

</body>
</html>
