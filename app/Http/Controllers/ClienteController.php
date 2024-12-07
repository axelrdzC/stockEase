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
            'nombre' => 'required|string|max:255', 
            'email' => 'required|email|max:255|unique:clientes,email',
            'telefono' => 'required|regex:/^[0-9]{10}$/', 
            'direccion' => 'required|string|max:500', 
            'categoria_id' => 'required|exists:categorias,id', 
            'tipo' => 'required|in:regular,premium,vip', 
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
        ], [
            
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.regex' => 'El número de teléfono debe tener exactamente 10 dígitos.',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.max' => 'La dirección no puede exceder los 500 caracteres.',
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
            'tipo.required' => 'El tipo de cliente es obligatorio.',
            'tipo.in' => 'El tipo de cliente debe ser regular, premium o vip.',
            'img.image' => 'El archivo debe ser una imagen válida.',
            'img.mimes' => 'La imagen debe ser de tipo jpg, jpeg, png o gif.',
            'img.max' => 'La imagen no puede exceder los 2 MB.',
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
            'nombre' => 'required|string|max:255', 
            'email' => 'required|email|max:255|unique:clientes,email,' . $cliente->id, 
            'telefono' => 'required|regex:/^[0-9]{10}$/', 
            'direccion' => 'required|string|max:500',
            'categoria_id' => 'required|exists:categorias,id', 
            'tipo' => 'required|in:regular,premium,vip', 
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
        ], [
            
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.regex' => 'El número de teléfono debe tener exactamente 10 dígitos.',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.max' => 'La dirección no puede exceder los 500 caracteres.',
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
            'tipo.required' => 'El tipo de cliente es obligatorio.',
            'tipo.in' => 'El tipo de cliente debe ser regular, premium o vip.',
            'img.image' => 'El archivo debe ser una imagen válida.',
            'img.mimes' => 'La imagen debe ser de tipo jpg, jpeg, png o gif.',
            'img.max' => 'La imagen no puede exceder los 2 MB.',
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