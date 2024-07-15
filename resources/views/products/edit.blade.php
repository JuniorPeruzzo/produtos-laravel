@extends('layouts.app')

@section('title', 'Cadastro de produto')

@section('content')
<h1>Cadastro de produto</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('products._form', ['buttonText' => 'Salvar'])
</form>
@endsection