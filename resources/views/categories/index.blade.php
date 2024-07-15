@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<div class="container mt-4">
    <h1>Categorias</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Cadastrar Categoria</a>
    <ul class="list-group">
        @foreach($categories as $category)
        <li class="list-group-item">
            {{ $category->name }} - {{ $category->description }}
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning mx-2">Editar</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>
@endsection