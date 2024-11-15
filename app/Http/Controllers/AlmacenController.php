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

    public function create(){ return view('almacenes.create'); }

    public function store(Request $request) {
        $dataGeneral = new Almacen;
        $dataGeneral-> nombre = $request->input('nombre');
        $dataGeneral-> pais = $request->input('pais');
        $dataGeneral-> estado = $request->input('estado');
        $dataGeneral-> ciudad = $request->input('ciudad');
        $dataGeneral-> colonia = $request->input('colonia');
        $dataGeneral-> codigo_p = $request->input('codigo_p');

        $ubicacion = "{$dataGeneral->ciudad}, {$dataGeneral->estado}, {$dataGeneral->pais}, {$dataGeneral->colonia}, C.P. {$dataGeneral->codigo_p}";

        Almacen::create([
            'nombre' => $dataGeneral['nombre'],
            'ubicacion' => $ubicacion,
        ]);

        return redirect()->route('almacenes.index')->with('success', 'almacen agregado exitosamente');
    }

    public function edit(Almacen $almacen) {
        return view('almacenes.edit', ['almacen' => $almacen]);
    }

    public function update(Request $request, Almacen $almacen) {
    
        $validated = $request->validate([
            'nombre' => ['required'],
            'pais' => ['required'],
            'estado' => ['required'],
            'ciudad' => ['required'],
            'colonia' => ['required'],
            'codigo_p' => ['required'],
        ]);

        $ubicacion =  $request->ciudad . ', ' . $request->estado . ', ' . $request->pais . ', ' . $request->colonia . ', C.P ' . $request->codigo_p;

        $almacen->update([
            'nombre' => $validated['nombre'],
            'ubicacion' => $ubicacion,
        ]);
    
        return redirect()->route('almacenes.index')->with('status', 'almacen modificado exitosamente');
    }

    public function destroy(Almacen $almacen) {

        $almacen->delete();
        return redirect()->route('almacenes.index')->with('status', 'el almacen ha sido eliminado');
        
    }
}