@extends('layouts.app')

@section('title', 'Cantina - Hospital Maice')

@section('content')

@include('partials.modal_meusdados')
@include('partials.modal_checkout')
@include('partials.modal_carrinho')


   <!-- Cabeçalho Fixo Moderno -->
    <div class="sticky-top bg-white border-bottom p-3 mb-4 text-center shadow-sm" style="top: 0; z-index: 1020;">
        <h1 class="h3 fw-bold text-dark mb-3">Cantina - Hospital Maice</h1>
        <nav class="nav nav-pills nav-justified gap-2 bg-light p-1 rounded-pill">
            <a href="#secao-salgados" class="nav-link text-secondary fw-semibold py-1 rounded-pill active-category">Salgados</a>
            <a href="#secao-doces" class="nav-link text-secondary fw-semibold py-1 rounded-pill">Doces</a>
            <a href="#secao-bebidas" class="nav-link text-secondary fw-semibold py-1 rounded-pill">Bebidas</a>
        </nav>
    </div>

    <!-- Seção: Salgados -->
    <div class="mb-5">
        <h2 id="secao-salgados" class="h5 text-success fw-bold text-uppercase border-bottom pb-2 mb-3">Salgados</h2>
        @foreach($salgados as $produto)
            <form action="{{ route('carrinho.adicionar') }}" method="POST" class="d-flex align-items-center justify-content-between border-bottom py-3 bg-white px-2 rounded hover-shadow transition-all mb-2">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                
                <div class="d-flex align-items-start gap-3 flex-grow-1 me-2" style="min-width: 0;">
                    <!-- Ajuste de Imagem com Fallback para não quebrar o layout -->
                    <div style="width:75px; height:75px; min-width:75px;" class="bg-light rounded border d-flex align-items-center justify-content-center overflow-hidden">
                        @if($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="w-100 h-100" style="object-fit:cover;" onerror="this.onerror=null; this.parentElement.innerHTML='<i class=\'bi bi-egg-fried text-muted fs-3\'></i>';">
                        @else
                            <i class="bi bi-egg-fried text-muted fs-3">+</i>
                        @endif
                    </div>

                    <div style="min-width: 0;">
                        <div class="fw-bold text-dark text-truncate h6 mb-1">{{ $produto->nome }}</div>
                        <div class="text-muted small text-wrap text-truncate-2 mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $produto->descricao }}
                        </div>
                        <div class="text-success fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success rounded-circle d-flex align-items-center justify-content-center border-0 shadow-sm p-0" style="width: 36px; height: 36px; min-width: 36px;">
                    <i class="bi bi-plus-lg fs-5">+</i>
                </button>
            </form>
        @endforeach
    </div>

    <!-- Seção: Doces -->
    <div class="mb-5">
        <h2 id="secao-doces" class="h5 text-success fw-bold text-uppercase border-bottom pb-2 mb-3">Doces</h2>
        @foreach($doces as $produto)
            <form action="{{ route('carrinho.adicionar') }}" method="POST" class="d-flex align-items-center justify-content-between border-bottom py-3 bg-white px-2 rounded hover-shadow transition-all mb-2">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                
                <div class="d-flex align-items-start gap-3 flex-grow-1 me-2" style="min-width: 0;">
                    <div style="width:75px; height:75px; min-width:75px;" class="bg-light rounded border d-flex align-items-center justify-content-center overflow-hidden">
                        @if($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="w-100 h-100" style="object-fit:cover;" onerror="this.onerror=null; this.parentElement.innerHTML='<i class=\'bi bi-cake2 text-muted fs-3\'></i>';">
                        @else
                            <i class="bi bi-cake2 text-muted fs-3"></i>
                        @endif
                    </div>

                    <div style="min-width: 0;">
                        <div class="fw-bold text-dark text-truncate h6 mb-1">{{ $produto->nome }}</div>
                        <div class="text-muted small text-wrap text-truncate-2 mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $produto->descricao }}
                        </div>
                        <div class="text-success fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success rounded-circle d-flex align-items-center justify-content-center border-0 shadow-sm p-0" style="width: 36px; height: 36px; min-width: 36px;">
                    <i class="bi bi-plus-lg fs-5">+</i>
                </button>
            </form>
        @endforeach
    </div>

    <!-- Seção: Bebidas -->
    <div class="mb-5">
        <h2 id="secao-bebidas" class="h5 text-success fw-bold text-uppercase border-bottom pb-2 mb-3">Bebidas</h2>
        @foreach($bebidas as $produto)
            <form action="{{ route('carrinho.adicionar') }}" method="POST" class="d-flex align-items-center justify-content-between border-bottom py-3 bg-white px-2 rounded hover-shadow transition-all mb-2">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                
                <div class="d-flex align-items-start gap-3 flex-grow-1 me-2" style="min-width: 0;">
                    <div style="width:75px; height:75px; min-width:75px;" class="bg-light rounded border d-flex align-items-center justify-content-center overflow-hidden">
                        @if($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="w-100 h-100" style="object-fit:cover;" onerror="this.onerror=null; this.parentElement.innerHTML='<i class=\'bi bi-cup-straw text-muted fs-3\'></i>';">
                        @else
                            <i class="bi bi-cup-straw text-muted fs-3">+</i>
                        @endif
                    </div>

                    <div style="min-width: 0;">
                        <div class="fw-bold text-dark text-truncate h6 mb-1">{{ $produto->nome }}</div>
                        <div class="text-muted small text-wrap text-truncate-2 mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $produto->descricao }}
                        </div>
                        <div class="text-success fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success rounded-circle d-flex align-items-center justify-content-center border-0 shadow-sm p-0" style="width: 36px; height: 36px; min-width: 36px;">
                    <i class="bi bi-plus-lg fs-5"></i>
                </button>
            </form>
        @endforeach
    </div>


    
    <div class="sticky-bottom bg-success text-white py-1">
        <div class="container-fluid">
            <div class="d-flex text-center">
                <div class="flex-fill">
                    <button id="btn-usuario" class="btn text-white d-block w-100" data-bs-toggle="modal"
                        data-bs-target="#dadosModal">
                        <div class="d-flex flex-column align-items-center">
                            <span class="fs-4"></span>
                            <strong>Meus Dados</strong>
                        </div>
                    </button>
                </div>

                <div class="border-start border-white"></div>
                <div class="flex-fill">
                    <button id="btn-ver-carrinho" class="btn text-white d-block w-100" data-bs-toggle="modal"
                        data-bs-target="#carrinhoModal">
                        <div class="d-flex flex-column align-items-center">
                            <span class="fs-4"></span>
                            <strong>Ver Itens</strong>
                        </div>
                    </button>
                </div>
                <div class="flex-fill">
                    <button id="btn-finalizar-compra" class="btn btn-warning d-block w-100 fw-bold"
                        data-bs-toggle="modal" data-bs-target="#checkoutModal">
                        <div class="d-flex flex-column align-items-center">
                            <span class="fs-3"></span>
                            <strong>Fazer Pedido</strong>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection

