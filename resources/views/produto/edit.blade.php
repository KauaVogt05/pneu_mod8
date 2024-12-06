@extends('layouts.layout')

@section('title', 'Editar Produto')

@section('content')
    <h1>Editar </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produtos.update', $produto->idProduto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" required>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" class="form-control" id="preco" name="preco" value="{{ old('preco', $produto->preco) }}" required>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Imagem (URL)</label>
            <input type="text" class="form-control" id="img" name="img" value="{{ old('img', $produto->img) }}">
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ old('descricao', $produto->descricao) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca', $produto->marca) }}" required>
        </div>
        <div class="mb-3">
            <label for="aro" class="form-label">Aro</label>
            <input type="text" class="form-control" id="aro" name="aro" value="{{ old('aro', $produto->aro) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
