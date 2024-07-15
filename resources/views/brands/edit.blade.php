@extends('layouts.app')

@section('title', 'Cadastro de Marca')

@section('content')
<h1>Cadastrar Marca</h1>
<form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('brands._form', ['buttonText' => 'Salvar'])
</form>
@endsection