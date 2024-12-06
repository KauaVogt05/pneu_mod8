<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Aplicação Laravel')</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Estilos personalizados */
            body {
                background-color: #f8f9fa;
            }
            .navbar {
                margin-bottom: 20px;
            }
            footer {
                background-color: #343a40;
                color: white;
                padding: 15px 0;
                text-align: center;
            }
        </style>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('produtos.index') }}">Loja de Pneus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('pedido') ? 'active' : '' }}" href="{{ route('pedidos.index') }}">
                    <i class="fas fa-list"></i>Pedido
                </a>
            </li>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
