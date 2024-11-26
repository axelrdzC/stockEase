<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'categoria_id' => 'required',
            'img' => 'nullable|image', 
        ]);

        $cliente = Cliente::create($request->all());

        if ($request->hasFile('img')) {
            $nombre = $cliente->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/clientes', $nombre, 'public');
            $cliente->img = '/storage/img/clientes/'.$nombre;
            $cliente->save();
        }
    
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado exitosamente');
    }

    public function edit(Cliente $cliente) {
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, Cliente $cliente) {
    
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'categoria_id' => 'required',
            'img' => 'nullable|image', 
        ]);

        if ($request->hasFile('img')) {
            Storage::disk('public')->delete($cliente->img);
            $nombre = $cliente->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/clientes', $nombre, 'public');
            $cliente->img = '/storage/img/clientes/'.$nombre;
            $cliente->save();
        }

        $cliente->update($request->input());
    
        return redirect()->route('clientes.index')->with('status', 'cliente modificado exitosamente');
    }

    public function destroy(Cliente $cliente) {

        $cliente->delete();
        return redirect()->route('clientes.index')->with('status', 'el Cliente ha sido eliminado');
        
    }
}