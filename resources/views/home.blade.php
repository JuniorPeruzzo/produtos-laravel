<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        padding: 20px;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Páginas</h1>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Produtos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('brands.index') }}">Marcas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categorias</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('stock.update') }}">Controle de Estoque</a></li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>