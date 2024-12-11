<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;

class ClienteController extends Controller {
    
    use \OwenIt\Auditing\Auditable;

    # bloquear edicion / creacion / eliminacion para empleados normales
    public function __construct() {
        $this->middleware('can:crear clientes', [
            'only' => [
                'create', 'store'
            ],
        ]);
        $this->middleware('can:editar clientes', [
            'only' => [
                'edit', 'update'
            ],
        ]);
        $this->middleware('can:eliminar clientes', [
            'only' => [
                'destroy'
            ],
        ]);
    }
    
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
            'tipo' => 'required', 
            'img' => 'nullable', 
        ]);

        $cliente = Cliente::create($request->all());

        if ($request->hasFile('img')) {
            $nombre = $cliente->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/clientes', $nombre, 'public');
            $cliente->img = '/storage/img/clientes/'.$nombre;
        } else {
            $cliente->img = '/storage/img/persona-default.jpg';
        }
        
        $cliente->save();
    
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
            'tipo' => 'required', 
            'img' => 'nullable', 
        ]);

        if ($request->hasFile('img')) {

            if ($cliente->img && $cliente->img !== '/storage/img/persona-default.jpg') {
                Storage::disk('public')->delete($cliente->img);
            }

            $nombre = $cliente->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/clientes', $nombre, 'public');
            $cliente->img = '/storage/img/clientes/'.$nombre;

        }
        
        $cliente->save();
        $cliente->update($request->input());
    
        return redirect()->route('clientes.index')->with('status', 'cliente modificado exitosamente');
    }

    public function destroy(Cliente $cliente) {

        $cliente->delete();
        return redirect()->route('clientes.index')->with('status', 'el Cliente ha sido eliminado');
        
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));

    }

}