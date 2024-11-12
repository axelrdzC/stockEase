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

    public function create() { return view('clientes.create.general'); }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
        ]);
    
        $dataGeneral = Cliente::create([
            'nombre' => $validated['nombre'],
            'telefono' => $validated['telefono'],
            'direccion' => '',
            'email' => '',
        ]);

        return redirect()->route('clientes.create.ubicacion', ['Cliente' => $dataGeneral->id]);
    }

    public function createUbi($clienteId) { 
        $cliente = Cliente::findOrFail($clienteId);
        return view('clientes.create.ubicacion', compact('Cliente'));
    }

    public function storeFinal(Request $request, $clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);

        $validated = $request->validate([
            'direccion' => 'required',
            'email' => 'required',
        ]);

        $cliente->update($validated);
    
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado exitosamente');
    }

    public function destroy(Cliente $cliente) {

        $cliente->delete();
        return redirect()->route('clientes.index')->with('status', 'el Cliente ha sido eliminado');
        
    }
}