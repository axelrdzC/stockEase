<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Almacen;
use Illuminate\Http\Request;
use OwenIt\Auditing\Contracts\Auditable;

class SeccionController extends Controller
{
    
    public function store(Request $request, $almacenId)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);

        $almacen = Almacen::findOrFail($almacenId);

        $seccion = new Seccion($request->all());
        $almacen->secciones()->save($seccion);

        return response()->json(['success' => true, 'seccion' => $seccion], 201);
    }

    public function show(Seccion $seccion) {

        return view('secciones.show', compact('seccion'));

    }

}
