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

    
    public function edit(Seccion $seccion)
    {
        
    }

    public function update(Request $request, Seccion $seccion)
    { 
        $request->validate([
            'nombre' => 'required',
            'capacidad' => 'required',
        ]);

        $seccion->update($request->only(['nombre', 'capacidad']));

        // Obtener el ID del almacén relacionado
        $almacen = $seccion->almacen_id;

        // Redirigir con un mensaje de éxito
        return redirect()
            ->route('almacenes.show', ['almacen' => $almacen])
            ->with('status', 'Sección modificada exitosamente');
    }

    public function show(Seccion $seccion) {

        return view('secciones.show', compact('seccion'));

    }

}
