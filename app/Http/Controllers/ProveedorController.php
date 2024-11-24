<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create() { return view('proveedores.create'); }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'id_categoria' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'img' => 'nullable|image', 
        ]);
    
        $proveedor = Proveedor::create($request->all());

        if ($request->hasFile('img')) {
            $nombre = $proveedor->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img', $nombre, 'public');
            $proveedor->img = '/storage/img/'.$nombre;
            $proveedor->save();
        }

        return redirect()->route('proveedores.index')->with('success', 'proveedor agregado exitosamente');
    }

    public function edit(Proveedor $proveedor) {
        return view('proveedores.edit', ['proveedor' => $proveedor]);
    }

    public function update(Request $request, Proveedor $proveedor) {
    
        $validated = $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'id_categoria' => 'required',
            'direccion' => 'required',
            'email' => 'required',
        ]);

        $proveedor->update($validated);
    
        return redirect()->route('proveedores.index')->with('status', 'proveedor modificado exitosamente');
    }

    public function destroy(Proveedor $proveedor) {

        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor y sus productos asociados han sido eliminados exitosamente.');
    }
    
}