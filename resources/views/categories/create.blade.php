@extends('layouts.app')

@section('title', 'Cadastro de Categoria')

@section('content')
<h1>Cadastrar Categoria</h1>
<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" `>
    @csrf
    @include('categories._form', ['buttonText' => 'Salvar'])
</form>
@endsection