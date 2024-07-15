@extends('layouts.app')

@section('title', 'Cadastro de Categoria')

@section('content')
<h1>Cadastrar Categoria</h1>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('categories._form', ['buttonText' => 'Salvar'])
</form>
@endsection