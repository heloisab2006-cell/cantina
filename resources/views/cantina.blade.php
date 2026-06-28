@extends('layouts.app')

@section('title', 'Cantina - Hospital Maice')

@section('content')

@include('partials.modal_meusdados')
@include('partials.modal_checkout')
@include('partials.modal_carrinho')


    <div class="container py-3">

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
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}"
                        class="rounded img-thumbnail" style="width:70px;height:70px;object-fit:cover;">

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
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}"
                        class="rounded img-thumbnail" style="width:70px;height:70px;object-fit:cover;">

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
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}"
                        class="rounded img-thumbnail" style="width:70px;height:70px;object-fit:cover;">

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

