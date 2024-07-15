@extends('layouts.app')

@section('title', 'Controle de Estoque')

@section('content')
<div class="container mt-4">
    <h1>Controle de Estoque</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('stock.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Produto</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Selecione um produto</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="operation">Operação</label>
            <select name="operation" id="operation" class="form-control" required>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
                <option value="balanco">Balanço</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Quantidade</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection