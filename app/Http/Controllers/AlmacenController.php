<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::latest()->paginate(10);
        return view('almacenes.index', compact('almacenes'));
    }

    public function create(){ return view('almacenes.create.general'); }

    public function store(Request $request)
    {
        $dataGeneral = new Almacen;
        $dataGeneral-> nombre = $request->input('nombre');
        $dataGeneral-> pais = $request->input('pais');
        $dataGeneral-> estado = $request->input('estado');
        $dataGeneral-> ciudad = $request->input('ciudad');
        $dataGeneral-> codigo_p = $request->input('codigo_p');

        $ubicacion = "{$dataGeneral->pais}, {$dataGeneral->estado}, {$dataGeneral->ciudad}, {$dataGeneral->codigo_p}";

        Almacen::create([
            'nombre' => $dataGeneral['nombre'],
            'ubicacion' => $ubicacion,
        ]);

        return redirect()->route('almacenes.index')->with('success', 'almacen agregado exitosamente');
    }

    public function destroy(Almacen $almacen) {

        $almacen->delete();
        return redirect()->route('almacenes.index')->with('status', 'el almacen ha sido eliminado');
    }
}