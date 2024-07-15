<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        padding-top: 4.5rem;
        background-color: #fff;
        color: #000;
    }

    header {
        background-color: #007bff;
    }

    header nav ul {
        display: flex;
        list-style-type: none;
        margin: 0;
        padding: 0;
        justify-content: center;
    }

    header nav ul li {
        margin: 0 10px;
    }

    header nav ul li a {
        color: #000;
        text-decoration: none;
    }

    header nav ul li a:hover {
        color: #fff;
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #007bff;">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('brands.index') }}">Marcas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('stock.update') }}">Controle de Estoque</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container mt-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>