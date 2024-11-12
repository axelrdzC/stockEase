<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create() { return view('proveedores.create.general'); }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
        ]);
    
        $dataGeneral = Proveedor::create([
            'nombre' => $validated['nombre'],
            'telefono' => $validated['telefono'],
            'direccion' => '',
            'email' => '',
        ]);

        return redirect()->route('proveedores.create.ubicacion', ['proveedor' => $dataGeneral->id]);
    }

    public function createUbi($proveedorId) { 
        $proveedor = Proveedor::findOrFail($proveedorId);
        return view('proveedores.create.ubicacion', compact('proveedor'));
    }

    public function storeFinal(Request $request, $proveedorId)
    {
        $proveedor = Proveedor::findOrFail($proveedorId);

        $validated = $request->validate([
            'direccion' => 'required',
            'email' => 'required',
        ]);

        $proveedor->update($validated);
    
        return redirect()->route('proveedores.index')->with('success', 'Proveedor agregado exitosamente');
    }

    public function destroy(Proveedor $proveedor) {

        $proveedor->delete();
        return redirect()->route('proveedor.index')->with('status', 'el proveedor ha sido eliminado');
        
    }
}