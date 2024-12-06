<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index', compact('produtos'));
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'img' => 'nullable|string',
            'descricao' => 'nullable|string',
            'marca' => 'required|string|max:255',
            'aro' => 'required|string|max:255',
        ]);

        Produto::create($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto.edit', compact('produto'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'preco' => 'required|numeric',
        'img' => 'nullable|string',
        'descricao' => 'nullable|string',
        'marca' => 'required|string|max:255',
        'aro' => 'required|string|max:255',
    ]);

    $produto = Produto::findOrFail($id);
    $produto->update($request->all());

    return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
}



    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
    public function search(Request $request)
{
    $search = $request->input('search'); // Captura o termo de busca

    // Busca por nome, marca ou descrição
    $produtos = Produto::query()
        ->where('nome', 'like', "%{$search}%")
        ->orWhere('marca', 'like', "%{$search}%")
        ->orWhere('descricao', 'like', "%{$search}%")
        ->orWhere('aro', 'like', "%{$search}%")
        ->paginate(10); // Paginação para organizar os resultados

    return view('produto.index', compact('produtos', 'search'));
}

}
