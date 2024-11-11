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

    public function store(Request $request)
    {
        $dataGeneral = new Almacen;
        $dataGeneral-> nombre = $request->input('nombre');
        $dataGeneral-> ubicacion = $request->input('ubicacion');

        Almacen::create([
            'nombre' => $dataGeneral['nombre'],
            'ubicacion' => $dataGeneral['ubicacion'],
        ]);

        return redirect()->route('almacenes.index')->with('success', 'almacen agregado exitosamente');
    }

    public function destroy(Almacen $almacen) {

        $almacen->delete();
        return redirect()->route('almacenes.index')->with('status', 'el almacen ha sido eliminado');
        
    }
}