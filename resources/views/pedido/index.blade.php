@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Pedidos</h1>

    <a href="{{ route('pedidos.create') }}" class="btn btn-primary mb-3">Criar Novo Pedido</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('produtos.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar produto..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data do Pedido</th>
                <th>Valor Total</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->idPedido }}</td>
                    <td>{{ $pedido->data_pedido }}</td>
                    <td>R$ {{ number_format($pedido->total_valor, 2, ',', '.') }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td>
                        <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir este pedido?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum pedido cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
