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
            'categoria_id' => 'required',
        ]);

        Cliente::create($validated);
    
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado exitosamente');
    }

    public function edit(Cliente $cliente) {
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, Cliente $cliente) {
    
        $validated = $request->validate([
            'nombre' => ['required'],
            'email' => ['required'],
            'telefono' => ['required'],
            'direccion' => ['required'],
            'categoria_id' => ['required'],
        ]);

        $cliente->update([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'],
            'direccion' => $validated['direccion'],
            'categoria_id' => $validated['categoria_id'],
        ]);
    
        return redirect()->route('clientes.index')->with('status', 'cliente modificado exitosamente');
    }

    public function destroy(Cliente $cliente) {

        $cliente->delete();
        return redirect()->route('clientes.index')->with('status', 'el Cliente ha sido eliminado');
        
    }
}