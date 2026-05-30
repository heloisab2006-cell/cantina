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
    transition: background-color 0.2s ease, color 0.2s ease; /* Transição suave de cor */
}

/* Esta classe controla o botão ativo (clicado) */
.category-btn.active {
    background-color: #474747 !important; /* Cor cinza escuro idêntica à imagem */
    color: white !important; /* Texto branco */
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
                            <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
                    <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">                    <input type="hidden" name="id" value="1">
                    <input type="hidden" name="name" value="SANDUÍCHE DE FRANGO">
                    <input type="hidden" name="price" value="5">
                    
                    <div class="product-info">
                        <div class="product-img-box">
                            <img class="product-img" src="http://localhost:8000/img/sanduichefrango.jpg" alt="SANDUÍCHE DE FRANGO">
                        </div>
                        
                        <div class="product-details">
                            <span class="product-name">SANDUÍCHE DE FRANGO</span>
                            <span class="product-desc">Sanduíche de frango com maionese</span>
                            <span class="product-price">R$ 5,00</span>
                        </div>
                    </div>
                    <button type="submit" class="add-btn">+</button>
                </form>
                            <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
                    <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">                    <input type="hidden" name="id" value="2">
                    <input type="hidden" name="name" value="PÃO DE QUEIJO">
                    <input type="hidden" name="price" value="5">
                    
                    <div class="product-info">
                        <div class="product-img-box">
                            <img class="product-img" src="http://localhost:8000/img/paoqueijo.jpg" alt="PÃO DE QUEIJO">
                        </div>
                        
                        <div class="product-details">
                            <span class="product-name">PÃO DE QUEIJO</span>
                            <span class="product-desc">6 unidades de pão de queijo</span>
                            <span class="product-price">R$ 5,00</span>
                        </div>
                    </div>
                    <button type="submit" class="add-btn">+</button>
                </form>
                        <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
                    <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">                    <input type="hidden" name="id" value="2">
                    <input type="hidden" name="name" value="CROISSANT">
                    <input type="hidden" name="price" value="9">
                    
                    <div class="product-info">
                        <div class="product-img-box">
                            <img class="product-img" src="http://localhost:8000/img/cro.jpg" alt="CROISSANT">
                        </div>
                        
                        <div class="product-details">
                            <span class="product-name">CROISSANT</span>
                            <span class="product-desc">1 unidade de croissant de peito de peru</span>
                            <span class="product-price"><R1></R1>R$ 9,00</span>
                        </div>
                    </div>
                    <button type="submit" class="add-btn">+</button>
                </form>
                 <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
                    <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">                    <input type="hidden" name="id" value="2">
                    <input type="hidden" name="name" value="PASTEL">
                    <input type="hidden" name="price" value="10">
                    
                    <div class="product-info">
                        <div class="product-img-box">
                            <img class="product-img" src="http://localhost:8000/img/pastel.jpg" alt="PASTEL">
                        </div>
                        
                        <div class="product-details">
                            <span class="product-name">PASTEL</span>
                            <span class="product-desc">1 unidade de pastel de carne</span>
                            <span class="product-price"><R1></R1>R$ 10,00</span>
                        </div>
                    </div>
                    <button type="submit" class="add-btn">+</button>
                </form>
            
            <!-- SEÇÃO DE DOCES -->
            <h2 class="section-title" id="secao-doces" style="margin-top: 35px;">Doces</h2>    
                            <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
                    <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">                    <input type="hidden" name="id" value="3">
                    <input type="hidden" name="name" value="BROWNIE DE CHOCOLATE">
                    <input type="hidden" name="price" value="7">
                    
                    <div class="product-info">
                        <div class="product-img-box">
                            <img class="product-img" src="http://localhost:8000/img/brownie.jpg" alt="BROWNIE DE CHOCOLATE">
                        </div>
                        
                        <div class="product-details">
                            <span class="product-name">BROWNIE DE CHOCOLATE</span>

                    <span class="product-desc">Brownie de chocolate preto</span>
                    <span class="product-price">R$ 7,00</span>
                </div>
            </div>
            <button type="submit" class="add-btn">+</button>
        </form>
                    <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
                    <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">                    <input type="hidden" name="id" value="4">
                    <input type="hidden" name="name" value="COOKIE">
                    <input type="hidden" name="price" value="3.5">
                    
                    <div class="product-info">
                        <div class="product-img-box">
                            <img class="product-img" src="http://localhost:8000/img/cookie.jpg" alt="COOKIE">
                        </div>
                        
                        <div class="product-details">
                            <span class="product-name">COOKIE</span>

                    <span class="product-desc">Cookie gourmet tradicional</span>
                    <span class="product-price">R$ 3,50</span>
                </div>
            </div>
            <button type="submit" class="add-btn">+</button>
        </form>
      <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
                    <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">                    <input type="hidden" name="id" value="4">
                    <input type="hidden" name="name" value="BOLO DE POTE SENSAÇÃO">
                    <input type="hidden" name="price" value="13">
                    
                    <div class="product-info">
                        <div class="product-img-box">
                            <img class="product-img" src="http://localhost:8000/img/bolopote.jpg" alt="BOLO DE POTE SENSAÇÃO">
                        </div>
                        
                        <div class="product-details">
                            <span class="product-name">BOLO DE POTE SENSAÇÃO</span>

                    <span class="product-desc">1 unidade de bolo de pote de chocolate com leite ninho e morangos</span>
                    <span class="product-price">R$ 13,00</span>
                </div>
            </div>
            <button type="submit" class="add-btn">+</button>
        </form>
    <!-- SEÇÃO DE BEBIDAS (ADICIONADA DE VOLTA) -->
    <h2 class="section-title" id="secao-bebidas" style="margin-top: 35px;">Bebidas</h2>    
            <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
            <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">            <input type="hidden" name="id" value="5">
            <input type="hidden" name="name" value="GUARANÁ">
            <input type="hidden" name="price" value="6">
            
            <div class="product-info">
                <div class="product-img-box">
                    <img class="product-img" src="http://localhost:8000/img/guarana220.jpg" alt="GUARANÁ">
                </div>
                
                <div class="product-details">
                    <span class="product-name">GUARANÁ LATA</span>
                    <span class="product-desc">Guarana 220ml</span>
                    <span class="product-price">R$ 6,00</span>
                </div>
            </div>
            <button type="submit" class="add-btn">+</button>
        </form>
            <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
            <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">            <input type="hidden" name="id" value="6">
            <input type="hidden" name="name" value="COCA COLA LATA">
            <input type="hidden" name="price" value="5">
            
            <div class="product-info">
                <div class="product-img-box">
                    <img class="product-img" src="http://localhost:8000/img/coca220.jpg" alt="COCA COLA LATA">
                </div>
                
                <div class="product-details">
                    <span class="product-name">COCA COLA LATA</span>
                    <span class="product-desc">Coca-cola 220ml</span>
                    <span class="product-price">R$ 5,00</span>
                </div>
            </div>
            <button type="submit" class="add-btn">+</button>
        </form>
            <form action="http://localhost:8000/carrinho/adicionar" method="POST" class="product-card">
            <input type="hidden" name="_token" value="pJkzdtfv9G6O7LIWDDHcYi4knvftNYHOzgmNR5MT" autocomplete="off">            <input type="hidden" name="id" value="6">
            <input type="hidden" name="name" value="SUCO DE LARANJA">
            <input type="hidden" name="price" value="7">
            
            <div class="product-info">
                <div class="product-img-box">
                    <img class="product-img" src="http://localhost:8000/img/sucolaranja.jpg" alt="SUCO DE LARANJA">
                </div>
                
                <div class="product-details">
                    <span class="product-name">SUCO DE LARANJA</span>
                    <span class="product-desc">Suco de laranja</span>
                    <span class="product-price">R$ 7,00</span>
                </div>
            </div>
            <button type="submit" class="add-btn">+</button>
        </form>
    </main>
     <!-- Aqui termina o conteúdo principal dos lanches -->
<div class="footer-cart" style="position: fixed; bottom: 0; left: 50%; transform: translateX(-50%); width: 100%; max-width: 450px; height: 60px; background-color: #2e7d32; display: flex; align-items: center; justify-content: space-between; padding: 0; color: white; z-index: 9999; box-shadow: 0 -4px 10px rgba(0,0,0,0.15); box-sizing: border-box;">
    
    <!-- BOTÃO 1: SÍMBOLO DE USUÁRIO (Apenas abre a confirmação de dados) -->
    <button id="btn-usuario" type="button" style="flex: 1; height: 100%; background: none; border: none; color: white; cursor: pointer; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 4px; padding: 0; margin: 0; box-sizing: border-box;">
        <div style="position: relative; display: inline-block; font-size: 22px; line-height: 1;">
            👤
            <!-- Badge de aviso controlado por JavaScript -->
            <span id="badge-status" style="position: absolute; top: -4px; right: -8px; background-color: #d32f2f; color: white; font-size: 9px; width: 14px; height: 14px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-family: sans-serif; border: 1px solid #2e7d32;">!</span>
        </div>
        <span style="font-size: 11px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; font-family: sans-serif;">Meus Dados</span>
    </button>

    <!-- DIVISOR VISUAL -->
    <div style="width: 1px; height: 35px; background-color: rgba(255,255,255,0.25); flex-shrink: 0;"></div>

    <!-- BOTÃO 2: SÍMBOLO DE CARRINHO (Apenas mostra itens com lixeira) -->
    <button id="btn-ver-carrinho" type="button" style="flex: 1; height: 100%; background: none; border: none; color: white; cursor: pointer; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 4px; padding: 0; margin: 0; box-sizing: border-box; position: relative;">
        <div style="font-size: 22px; line-height: 1; position: relative; display: inline-block;">
            🛒
            <span id="cart-contador-laranja" style="position: absolute; top: -6px; right: -10px; background-color: #ff9100; color: white; font-size: 10px; width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-family: sans-serif; display: none;">0</span>
        </div>
        <span style="font-size: 11px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; font-family: sans-serif;">Ver Itens</span>
    </button>

    <!-- BOTÃO 3: FAZER PEDIDO (Apenas finaliza/revisa a compra se houver dados) -->
    <button id="btn-finalizar-compra" type="button" onclick="cliqueFinalizarCompra()" style="flex: 130px; width: 130px; height: 100%; background-color: #ff9100; border: none; color: white; cursor: pointer; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 4px; padding: 0; margin: 0; flex-shrink: 0; box-sizing: border-box;">
        <div style="font-size: 22px; line-height: 1;">🚀</div>
        <span style="font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.3px; font-family: sans-serif;">Fazer Pedido</span>
    </button>

</div>

</div> <!-- Fecha a div app-container -->


<!-- ================================================================= -->
<!-- MODAIS SOBREPOSTOS NO SEU PADRÃO DE DESIGN (CANTOS ARREDONDADOS) -->
<!-- ================================================================= -->

<!-- 1. TELA DE CONFIRMAÇÃO DE IDENTIDADE (FORMULÁRIO) -->
<div id="tela-confirmacao" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 20000; justify-content: center; align-items: center; font-family: sans-serif; box-sizing: border-box;">
    <div style="background-color: #ffffff; width: 90%; max-width: 420px; border-radius: 24px; padding: 30px 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); display: flex; flex-direction: column; position: relative; box-sizing: border-box;">
        <button type="button" id="btn-fechar-modal" style="position: absolute; top: 15px; right: 20px; background: none; border: none; font-size: 22px; color: #888; cursor: pointer; font-weight: bold;">✕</button>

        <h2 style="color: #474747; font-size: 13px; font-weight: 700; margin: 0 0 4px 0; text-align: center; letter-spacing: 0.5px; text-transform: uppercase;">CANTINA - HOSPITAL MAICE</h2>
        <h3 style="color: #2e7d32; font-size: 20px; font-weight: 700; margin: 0 0 25px 0; text-align: center; letter-spacing: 0.5px; text-transform: uppercase;">CONFIRMAR IDENTIDADE</h3>
        
        <form id="form-identidade" style="display: flex; flex-direction: column; gap: 15px; margin: 0;">
            <div>
                <label for="nome" style="display: block; font-size: 12px; font-weight: bold; color: #474747; margin-bottom: 4px; text-transform: uppercase;">SEU NOME: *</label>
                <input type="text" id="nome" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 30px; box-sizing: border-box; outline: none; font-size: 14px; background-color: #fafafa;">
            </div>

            <div>
                <label for="cpf" style="display: block; font-size: 12px; font-weight: bold; color: #474747; margin-bottom: 4px; text-transform: uppercase;">SEU CPF: *</label>
                <input type="text" id="cpf" required placeholder="000.000.000-00" style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 30px; box-sizing: border-box; outline: none; font-size: 14px; background-color: #fafafa;">
            </div>

            <div style="display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <label for="setor" style="display: block; font-size: 12px; font-weight: bold; color: #474747; margin-bottom: 4px; text-transform: uppercase;">SETOR: *</label>
                    <select id="setor" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 30px; background-color: #fafafa; box-sizing: border-box; outline: none; font-size: 14px; height: 44px; cursor: pointer;">
                        <option value="">Selecione...</option>
                        <option value="Pronto Socorro">Pronto Socorro</option>
                        <option value="Pediatria">Pediatria</option>
                        <option value="Maternidade">Maternidade</option>
                        <option value="UTI">UTI</option>
                    </select>
                </div>
                <div style="flex: 1;">
    <label for="quarto" style="display: block; font-size: 12px; font-weight: bold; color: #474747; margin-bottom: 4px; text-transform: uppercase;">QUARTO: *</label>

    <select id="quarto" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 30px; background-color: #fafafa; box-sizing: border-box; outline: none; font-size: 14px; height: 44px; cursor: pointer;">

        <option value="">Selecione...</option>
        <option value="1">Quarto 1</option>
        <option value="2">Quarto 2</option>
        <option value="3">Quarto 3</option>
        <option value="4">Quarto 4</option>
        <option value="5">Quarto 5</option>
        <option value="6">Quarto 6</option>
        <option value="7">Quarto 7</option>
        <option value="8">Quarto 8</option>
        <option value="9">Quarto 9</option>
        <option value="10">Quarto 10</option>

    </select>
</div>
            </div>

            <button type="submit" style="width: 100%; background-color: #000000; color: #ffffff; border: none; padding: 14px; border-radius: 30px; font-weight: bold; text-transform: uppercase; font-size: 14px; margin-top: 10px; cursor: pointer; letter-spacing: 0.5px;">CONFIRMAR DADOS</button>
        </form>
    </div>
</div>

<!-- 2. TELA DE ITENS DO CARRINHO (SOBREPOSTA COM LIXEIRA) -->
<div id="modal-carrinho-itens" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 20000; justify-content: center; align-items: center; font-family: sans-serif; box-sizing: border-box;">
    <div style="background-color: #ffffff; width: 90%; max-width: 420px; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); display: flex; flex-direction: column; position: relative; box-sizing: border-box; max-height: 80vh;">
        <button type="button" id="btn-fechar-carrinho" style="position: absolute; top: 15px; right: 20px; background: none; border: none; font-size: 22px; color: #888; cursor: pointer; font-weight: bold;">✕</button>
        
        <h2 style="color: #474747; font-size: 13px; font-weight: 700; margin: 0 0 4px 0; text-align: center; letter-spacing: 0.5px; text-transform: uppercase;">CANTINA - HOSPITAL MAICE</h2>
        <h3 style="color: #2e7d32; font-size: 20px; font-weight: 700; margin: 0 0 20px 0; text-align: center; text-transform: uppercase;">Seu Carrinho</h3>
        
        <div style="overflow-y: auto; flex-grow: 1; margin-bottom: 20px; display: flex; flex-direction: column; gap: 12px; padding-right: 5px;">
                                        <p style="text-align: center; color: #999; padding: 30px; margin: 0; font-size: 14px;">Seu carrinho está vazio.</p>
                    </div> <!-- Fim da área rolável de itens -->

        <!-- Botão de Voltar para o Cardápio -->
        <div>
            <button type="button" onclick="document.getElementById('modal-carrinho-itens').style.display = 'none';" style="display: block; width: 100%; background-color: #474747; color: white; text-align: center; padding: 14px; border-radius: 12px; font-weight: bold; border: none; text-transform: uppercase; font-size: 14px; letter-spacing: 0.5px; cursor: pointer;">Voltar ao Cardápio</button>
        </div>
    </div>
</div>

<!-- ================================================================= -->
<!-- 3. TELA DE CHECKOUT FINAL (MODAL REVISÃO DO PEDIDO SOBREPOSTO) -->
<!-- ================================================================= -->
<div id="tela-checkout-final" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 25000; justify-content: center; align-items: center; min-height: 100vh; font-family: sans-serif; box-sizing: border-box;">
    <div style="background-color: #ffffff; width: 90%; max-width: 440px; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); display: flex; flex-direction: column; position: relative; box-sizing: border-box; max-height: 85vh; overflow-y: auto;">
        <button type="button" id="btn-fechar-checkout" style="position: absolute; top: 15px; right: 20px; background: none; border: none; font-size: 22px; color: #888; cursor: pointer; font-weight: bold; z-index: 10;">✕</button>

        <h2 style="color: #474747; font-size: 13px; font-weight: 700; margin: 0 0 4px 0; text-align: center; letter-spacing: 0.5px; text-transform: uppercase;">CANTINA - HOSPITAL MAICE</h2>
        <h3 style="color: #2e7d32; font-size: 20px; font-weight: 700; margin: 0 0 20px 0; text-align: center; letter-spacing: 0.5px; text-transform: uppercase;">REVISÃO DO PEDIDO</h3>

        <div style="display: flex; flex-direction: column; gap: 15px;">
            <!-- Bloco de Informações do Destinatário Confirmado -->
            <div style="background-color: #fafafa; border: 1px solid #eee; border-radius: 16px; padding: 15px;">
                <h4 style="margin: 0 0 8px 0; font-size: 11px; color: #777; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 700;">Dados de Entrega</h4>
                <p style="margin: 0 0 4px 0; font-size: 15px; font-weight: bold; color: #222;" id="resumo-nome">Carregando...</p>
                <p style="margin: 0 0 10px 0; font-size: 12px; color: #666;" id="resumo-cpf">CPF: --</p>
                <div style="display: flex; gap: 10px; background-color: #fff; padding: 8px 12px; border-radius: 30px; border: 1px solid #eef0f2; border-left: 4px solid #2e7d32;">
                    <div style="font-size: 12px; color: #333;">
                        Setor: <strong id="resumo-setor">--</strong>
                    </div>
                    <div style="margin-left: auto; font-size: 12px; color: #333;">
                        Acomodação: <strong id="resumo-quarto">--</strong>
                    </div>
                </div>
            </div>

            <!-- Bloco com os Itens do Carrinho e Valor Total -->
            <div style="background-color: #fff; border: 1px solid #eee; border-radius: 16px; padding: 15px;">
                <h4 style="margin: 0 0 12px 0; font-size: 11px; color: #777; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 700;">Itens no Carrinho</h4>
                
                <div style="display: flex; flex-direction: column; gap: 10px; max-height: 160px; overflow-y: auto; padding-right: 5px;">
                                    </div>

                <!-- EXIBIÇÃO DO VALOR TOTAL DOS ITENS -->
                <div style="margin-top: 15px; padding-top: 12px; border-top: 2px solid #f4f6f8; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 14px; font-weight: bold; color: #444; letter-spacing: 0.5px;">VALOR TOTAL:</span>
                    <span style="font-size: 20px; font-weight: 800; color: #2e7d32;">R$ 0,00</span>
                </div>
            </div>

            <!-- BOTÃO REAL DE ENVIAR O PEDIDO -->
            <button type="button" id="btn-comprar-de-fato" style="background-color: #2e7d32; color: white; border: none; width: 100%; padding: 15px; border-radius: 30px; font-size: 15px; font-weight: bold; text-transform: uppercase; cursor: pointer; box-shadow: 0 6px 20px rgba(46, 125, 50, 0.2); letter-spacing: 0.5px; margin-top: 5px;">
                🚀 FINALIZAR COMPRA
            </button>
        </div>
    </div>
</div>

<!-- ================================================================= -->
<!-- 4. POPUP STATUS DO PEDIDO (CRONÔMETRO DE ANIMAÇÃO DE SUCESSO) -->
<!-- ================================================================= -->
<div id="popup-sucesso-demo" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.6); z-index: 30000; justify-content: center; align-items: center; font-family: sans-serif;">
    <div style="background-color: white; padding: 35px 25px; border-radius: 24px; text-align: center; width: 85%; max-width: 360px; box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
        <div style="font-size: 45px; margin-bottom: 15px;">⏱️</div>
        <h3 style="color: #2e7d32; font-size: 20px; margin: 0 0 10px 0; font-weight: bold; text-transform: uppercase;" id="texto-status-pedido">Seu pedido está sendo realizado...</h3>
        <p style="color: #666; font-size: 15px; font-weight: 600; margin: 0;" id="texto-tempo-entrega">Máximo 15 minutos para entrega.</p>
        
        <div style="width: 100%; background-color: #eee; height: 6px; border-radius: 3px; margin-top: 25px; overflow: hidden;">
            <div id="barra-progresso" style="width: 0%; height: 100%; background-color: #2e7d32; transition: width 4s linear;"></div>
        </div>
    </div>
</div>


<script>
function ativarBotao(elemento) {
    // 1. Busca todos os botões de categoria na barra de navegação
    const botoes = document.querySelectorAll('.category-btn');
    
    // 2. Remove a classe 'active' (cor cinza) de todos eles
    botoes.forEach(btn => btn.classList.remove('active'));
    
    // 3. Adiciona a classe 'active' apenas no botão que o usuário clicou
    elemento.classList.add('active');
    
    // 4. Salva a última seção clicada na memória local do navegador (opcional)
    localStorage.setItem('ultimaSecao', elemento.getAttribute('href'));
}



    // Função interna para checar cookies de validação
    function obterCookie(nome) {
        let nomeEQ = nome + "=";
        let ca = document.cookie.split(';');
        for(let i=0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nomeEQ) == 0) return c.substring(nomeEQ.length,c.length);
        }
        return null;
    }

    // Carrega as configurações de inicialização do sistema
    window.addEventListener('DOMContentLoaded', () => {
        atualizarContadorCarrinho();

10

    

        // Se o cliente já tiver o cookie de dados salvo, marca como verificado
        if (obterCookie('identidadeConfirmada') === 'true') {
            dadosPreenchidos = true;
            marcarBadgeComoVerificado();
        }
    });

    // =================================================================
    // BOTÃO 1 (MEUS DADOS): EXCLUSIVAMENTE ABRE O MODAL DE IDENTIDADE
    // =================================================================
    const btnUsuario = document.getElementById('btn-usuario');
    if (btnUsuario) {
        btnUsuario.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            document.getElementById('tela-confirmacao').style.display = 'flex';
            sessionStorage.setItem('origemFluxo', 'botao_usuario');
        });
    }

    // =================================================================
    // BOTÃO 2 (VER ITENS): EXCLUSIVAMENTE ABRE A LISTAGEM DO CARRINHO
    // =================================================================
    const btnVerCarrinho = document.getElementById('btn-ver-carrinho');
    if (btnVerCarrinho) {
        btnVerCarrinho.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('modal-carrinho-itens').style.display = 'flex';
        });
    }

    // Controla o balão de quantidade laranja posicionado acima do carrinho
    function atualizarContadorCarrinho() {
        let totalItens = 0;
        
        if (carrinhoItens && typeof carrinhoItens === 'object') {
            Object.values(carrinhoItens).forEach(item => {
                totalItens += parseInt(item.quantidade || 1);
            });
        }

        const badgeCarrinho = document.getElementById('cart-contador-laranja');
        if (badgeCarrinho) {
            badgeCarrinho.innerText = totalItens;
            badgeCarrinho.style.display = totalItens > 0 ? 'flex' : 'none';
        }
    }

    // =================================================================
    // BOTÃO 3 (FAZER PEDIDO): FUNÇÃO DE ACIONAMENTO QUE ESTAVA TRAVADA
    // =================================================================
    function cliqueFinalizarCompra() {
        // Verifica o cookie ou o status dinâmico da sessão atual
        const jaVerificou = obterCookie('identidadeConfirmada') === 'true' || dadosPreenchidos;

        if (jaVerificou) {
            // Se já forneceu Nome/CPF antes, salta para o fechamento final com os totais
            abrirTelaCheckoutFinal();
        } else {
            // Se não forneceu, interrompe e joga ele na tela de confirmação de dados
            document.getElementById('tela-confirmacao').style.display = 'flex';
            sessionStorage.setItem('origemFluxo', 'fluxo_compra');
        }
    }

    // INTERCEPTADOR DO BOTÃO PRETO (CONFIRMAR DADOS)
    const formIdentidade = document.getElementById('form-identidade');
    if (formIdentidade) {
        formIdentidade.addEventListener('submit', function(e) {
            e.preventDefault();

            // Resgata o texto dos inputs e joga na tela de revisão do pedido
            document.getElementById('resumo-nome').textContent = document.getElementById('nome').value;
            document.getElementById('resumo-cpf').textContent = "CPF: " + document.getElementById('cpf').value;
            document.getElementById('resumo-setor').textContent = document.getElementById('setor').value;
            document.getElementById('resumo-quarto').textContent = "Quarto " + document.getElementById('quarto').value;

            // Grava o cookie para durar 1 dia inteiro
            const d = new Date();
            d.setTime(d.getTime() + (1*24*60*60*1000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = "identidadeConfirmada=true;" + expires + ";path=/";
            dadosPreenchidos = true;

            marcarBadgeComoVerificado();
            document.getElementById('tela-confirmacao').style.display = 'none';

            // Decisório do funil inteligente
            const origem = sessionStorage.getItem('origemFluxo');
            sessionStorage.removeItem('origemFluxo');

            if (origem === 'fluxo_compra') {
                abrirTelaCheckoutFinal(); // Se estava comprando, dá sequência automática para o checkout
            } else {
                alert("Identidade validada e salva!");
            }
        });
    }

    function abrirTelaCheckoutFinal() {
        // Fecha a listagem de itens se ela estiver aberta por baixo
        const modalLista = document.getElementById('modal-carrinho-itens');
        if (modalLista) modalLista.style.display = 'none';
        
        // Abre o Checkout Final centralizado em formato flex
        document.getElementById('tela-checkout-final').style.display = 'flex';
    }

    function marcarBadgeComoVerificado() {
        const badge = document.getElementById('badge-status');
        if (badge) {
            badge.textContent = '✓';
            badge.style.backgroundColor = '#00e676';
        }
    }

    // ENVIAR PEDIDO DE FATO (DISPARA O CRONÔMETRO DE 15 MINUTOS)
    const btnComprarDeFato = document.getElementById('btn-comprar-de-fato');
    if (btnComprarDeFato) {
        btnComprarDeFato.addEventListener('click', function() {
            const popup = document.getElementById('popup-sucesso-demo');
            const barra = document.getElementById('barra-progresso');
            
            if (popup && barra) {
                popup.style.display = 'flex';
                setTimeout(() => { barra.style.width = '100%'; }, 50);
                
                setTimeout(() => {
                    popup.style.display = 'none';
                    document.getElementById('tela-checkout-final').style.display = 'none';
                    
                    carrinhoItens = {};
                    atualizarContadorCarrinho();
                    
                    // Atualiza a URL limpando os modais abertos no servidor PHP sem quebrar rotas
                    window.location.href = window.location.pathname;
                }, 4000);
            }
        });
    }

    // MAPEAMENTO DOS BOTÕES DE FECHAR JANELAS (✕)
    document.getElementById('btn-fechar-modal').addEventListener('click', function() {
        document.getElementById('tela-confirmacao').style.display = 'none';
    });
    document.getElementById('btn-fechar-carrinho').addEventListener('click', function() {
        document.getElementById('modal-carrinho-itens').style.display = 'none';
    });
    document.getElementById('btn-fechar-checkout').addEventListener('click', function() {
        document.getElementById('tela-checkout-final').style.display = 'none';
    });
</script>
        
</html>