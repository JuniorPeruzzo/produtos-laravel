@extends('layouts.app')

@section('title', 'Marcas')

@section('content')
<h1 class="mt-5 mb-4">Marcas</h1>
<a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Cadastrar Marca</a>
<ul class="list-group">
    @foreach($brands as $brand)
    <li class="list-group-item">
        {{ $brand->name }}
        @if($brand->photo)
        <img src="{{ Storage::url($brand->photo) }}" alt="{{ $brand->name }}" class="img-thumbnail" style="max-width: 100px;">
        @endif
        <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-warning mx-2">Editar</a>
        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection