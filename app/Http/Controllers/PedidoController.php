<?php
namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedido.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedido.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_pedido' => 'required|date',
            'total_valor' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Pedido::create($request->all());
        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido criado com sucesso.');
    }


    public function edit(Pedido $pedido)
    {
        $pedido = Pedido::all();
        return view('pedido.edit', compact('pedido', 'pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'data_pedido' => 'required|date',
            'total_valor' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $pedido->update($request->all());
        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido removido com sucesso!');
    }
}
