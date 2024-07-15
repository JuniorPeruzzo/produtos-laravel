@extends('layouts.app')

@section('title', 'Cadastro de Marca')

@section('content')
<div class="container mt-4">
    <h1>Cadastrar Marca</h1>
    <form action="{{ isset($brand) ? route('brands.update', $brand->id) : route('brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($brand))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $brand->name ?? '') }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Foto:</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </form>
</div>
@endsection