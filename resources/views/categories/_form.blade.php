@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<div class="container mt-4">
    <h2>Cadastro de Categoria</h2>
    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
        @csrf
        @if(isset($category))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $category->description ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </form>
</div>
@endsection