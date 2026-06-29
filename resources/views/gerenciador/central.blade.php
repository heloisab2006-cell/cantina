@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Central de Navegação</h1>

        <!-- Categoria Cliente -->
        <h3 class="mt-4">Cliente</h3>
        <div class="row">
            <!-- Cardápio -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100 border-primary">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">CARDÁPIO</h5>
                        <p class="card-text">Veja o cardápio completo.</p>
                        <a href="{{ route('produtos.index') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categoria Funcionário -->
        <h3 class="mt-4">Funcionário</h3>
        <div class="row">
            <!-- Pedidos -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100 border-info">
                    <div class="card-body text-center">
                        <h5 class="card-title text-info">Pedidos</h5>
                        <p class="card-text">Acompanhe e gerencie os pedidos realizados.</p>
                        <a href="{{ route('pedidos.index') }}" class="btn btn-info">Ver Pedidos</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categoria Administrador -->
        <h3 class="mt-4">Administrador</h3>
        <div class="row">
            <!-- Gerenciar Produtos -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100 border-success">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Gerenciar Produtos</h5>
                        <p class="card-text">Adicione, edite ou remova itens do cardápio.</p>
                        <a href="{{ route('produtos.gerenciar') }}" class="btn btn-success">Gerenciar</a>
                    </div>
                </div>
            </div>

            <!-- Gerenciar Quarto e Setor -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100 border-success">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Gerenciar Setor e Quarto</h5>
                        <p class="card-text">Adicione, edite ou remova setores e quartos disponíveis.</p>
                        <a href="{{ route('setores.index') }}" class="btn btn-success">Gerenciar</a>
                    </div>
                </div>
            </div>

            <!-- Gerenciar Usuarios -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100 border-success">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Gerenciar Usuários</h5>
                        <p class="card-text">Adicione, edite, remova e categorize usuários disponíveis.</p>
                        <a href= "#" class="btn btn-success">Gerenciar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection