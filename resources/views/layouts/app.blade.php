<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cantina - Hospital Maice')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7RXXTJZRKZ"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-7RXXTJZRKZ');
</script>


<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('produtos.index') }}">
                <a href="{{ route('produtos.index') }}" title="Clique para visitar o site">
                    <img src="{{ asset('img/logo_maice.png') }}" alt="Descrição da imagem" width="50" height="50" />
                </a>
            </a>

            <!-- Botões à direita -->
            <div class="ms-auto d-flex">
                <a href="{{ route('central') }}" class="btn btn-warning">
                    Central
                </a>

                <a href="#" class="btn btn-outline-light me-2">
                    Login
                </a>

            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <small>&copy; {{ date('Y') }} Cantina Hospital Maice</small>
    </footer>

</body>

</html>