<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::latest()->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create() { return view('clientes.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'id_categoria' => 'required',
        ]);

        Cliente::create($validated);
    
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado exitosamente');
    }

    public function edit(Cliente $cliente) {
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    

    public function destroy(Cliente $cliente) {

        $cliente->delete();
        return redirect()->route('clientes.index')->with('status', 'el Cliente ha sido eliminado');
        
    }
}