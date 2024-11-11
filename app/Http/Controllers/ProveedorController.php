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

    public function create() { return view('proveedores.create'); }

    public function store(Request $request)
    {
        $dataGeneral = new Proveedor;
        $dataGeneral-> nombre = $request->input('nombre');
        $dataGeneral-> correo = $request->input('correo');
        $dataGeneral-> telefono = $request->input('telefono');
        $dataGeneral-> pais = $request->input('pais');
        $dataGeneral-> estado = $request->input('estado');
        $dataGeneral-> ciudad = $request->input('ciudad');
        $dataGeneral-> codigo_p = $request->input('codigo_p');
        $dataGeneral-> calle = $request->input('calle');
        $dataGeneral-> nExt = $request->input('nExt');
        $dataGeneral-> nInt = $request->input('nInt');
        $dataGeneral-> categoria_id = $request->input('categoria');

        $direccion = "{$dataGeneral->pais}, {$dataGeneral->estado}, {$dataGeneral->ciudad}, {$dataGeneral->codigo_p}, {$dataGeneral->calle}, {$dataGeneral->nExt}, {$dataGeneral->nInt}";

        Proveedor::create([
            'nombre' => $dataGeneral['nombre'],
            'correo' => $dataGeneral['correo'],
            'telefono' => $dataGeneral['telefono'],
            'direccion' => $direccion,
            'categoria_id' => $dataGeneral['categoria_id'],           
        ]);

        return redirect()->route('proveedores.index')->with('success', 'proveedor agregado exitosamente');
    }
    public function destroy(Proveedor $proveedor) {

        $proveedor->delete();
        return redirect()->route('proveedor.index')->with('status', 'el proveedor ha sido eliminado');
        
    }
}