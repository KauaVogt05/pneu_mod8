@extends('layouts.layout')

@section('title', 'Adicionar Produto')

@section('content')
    <h1>Adicionar </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" class="form-control" id="preco" name="preco" value="{{ old('preco') }}" required>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Imagem (URL)</label>
            <input type="text" class="form-control" id="img" name="img" value="{{ old('img') }}">
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ old('descricao') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') }}" required>
        </div>
        <div class="mb-3">
            <label for="aro" class="form-label">Aro</label>
            <input type="text" class="form-control" id="aro" name="aro" value="{{ old('aro') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
