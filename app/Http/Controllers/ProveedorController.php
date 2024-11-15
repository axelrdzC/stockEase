<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create() { return view('proveedores.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'id_categoria' => 'required',
            'direccion' => 'required',
            'email' => 'required',
        ]);
    
        Proveedor::create($validated);

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

        $proveedor->update($proveedorData);
    
        return redirect()->route('proveedores.index')->with('status', 'Producto modificado exitosamente');
    }

    public function destroy(Proveedor $proveedor) {

        DB::transaction(function () use ($proveedor) {
            $productos = $proveedor->productos;
            foreach ($productos as $producto) {
                $producto->delete();
            }

            $proveedor->delete();
        });

        return redirect()->route('proveedores.index')->with('status', 'el proveedor ha sido eliminado');
        
    }
    
}