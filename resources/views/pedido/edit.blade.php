@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Pedido</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pedido.update', $pedido) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="data_pedido" class="form-label">Data do Pedido</label>
            <input type="date" class="form-control" id="data_pedido" name="data_pedido" value="{{ $pedido->data_pedido }}" required>
        </div>

        <div class="mb-3">
            <label for="total_valor" class="form-label">Valor Total</label>
            <input type="number" step="0.01" class="form-control" id="total_valor" name="total_valor" value="{{ $pedido->total_valor }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $pedido->status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
