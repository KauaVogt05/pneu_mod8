@extends('layouts.layout')

@section('title', 'Lista de Produtos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Pneus</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">Adicionar Produto</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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
                <th>Nome</th>
                <th>Preço</th>
                <th>Marca</th>
                <th>Aro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->idProduto }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->marca }}</td>
                    <td>{{ $produto->aro }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto->idProduto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto->idProduto) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                        </form>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
