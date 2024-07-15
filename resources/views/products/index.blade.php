@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="container mt-4">
    <h1>Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>
    <ul class="list-group">
        @foreach($products as $product)
        <li class="list-group-item">
            Nome: {{ $product->name }} | Marca: {{ $product->brand->name }} | Categoria: {{ $product->category->name }}
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning mx-2">Editar</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>
@endsection