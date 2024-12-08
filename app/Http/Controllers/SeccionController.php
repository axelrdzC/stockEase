<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Almacen;
use App\Models\Producto;
use Illuminate\Http\Request;
use OwenIt\Auditing\Contracts\Auditable;

class SeccionController extends Controller
{
    
    public function store(Request $request, Almacen $almacen)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);

        $seccion = new Seccion($request->all());
        $almacen->secciones()->save($seccion);

        $productosSeleccionados = explode(',', $request->input('productos_seleccionados'));

        if (!empty($productosSeleccionados)) {
            $productos = Producto::whereIn('id', $productosSeleccionados)->get();
            foreach ($productos as $producto) {
                $producto->seccion_id = $seccion->id;
                $producto->save();
            }
        }

        return redirect()
        ->route('almacenes.show', ['almacen' => $almacen])
        ->with('status', 'Sección modificada exitosamente');
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
