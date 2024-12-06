@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Criar Pedido</h1>
    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="data_pedido" class="form-label">Data do Pedido</label>
            <input type="date" class="form-control" id="data_pedido" name="data_pedido" required>
        </div>
        <div class="mb-3">
            <label for="total_valor" class="form-label">Valor Total</label>
            <input type="number" step="0.01" class="form-control" id="total_valor" name="total_valor" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
