<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        ]);

        Session::put('form_data', $validated);
    
        return redirect()->route('proveedores.editDos', ['proveedor' => $proveedor])->with('status', 'Producto modificado exitosamente');
    }

    public function editDos(Proveedor $proveedor) {
        return view('proveedores.editDos', ['proveedor' => $proveedor]);
    }

    public function updateDos(Request $request, Proveedor $proveedor) {
    
        $validated = $request->validate([
            'direccion' => 'required',
            'email' => 'required',
        ]);
    
        $editForm_uno = Session::get('form_data');

        if (!$editForm_uno) {
            return redirect()->route('proveedor.edit')->withErrors(['error' => 'Por favor, para continuar complete el formulario.']);
        }

        $proveedorData = array_merge($editForm_uno, $validated);

        $proveedor->update($proveedorData);
        # Proveedor::create($proveedorData);
        Session::forget('form_data');
    
        return redirect()->route('proveedores.index')->with('status', 'Producto modificado exitosamente');
    }

    public function destroy(Proveedor $proveedor) {

        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('status', 'el proveedor ha sido eliminado');
        
    }
}