<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Proveedor; // Para obtener la lista de proveedores
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    // Muestra la lista de órdenes
    public function index()
    {
        $ordenes = Orden::latest()->paginate(10);
        return view('ordenes.index', compact('ordenes'));
    }

    // Muestra el formulario para crear una nueva orden
    public function create()
    {
        $proveedores = Proveedor::all(); // Obtiene los proveedores para el formulario
        return view('ordenes.create', compact('proveedores'));
    }

    // Guarda una nueva orden en la base de datos
    public function store(Request $request)
    {
        // Valida los datos de entrada
        $validated = $request->validate([
            'numero_orden' => 'required|unique:ordenes,numero_orden',
            'proveedor_id' => 'required|exists:proveedores,id',
            'estado' => 'required',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        // Crea la orden
        Orden::create($validated);

        return redirect()->route('ordenes.index')->with('success', 'Orden agregada exitosamente');
    }

    // Muestra el formulario para editar una orden existente
    public function edit(Orden $orden)
    {
        $proveedores = Proveedor::all(); // Obtiene los proveedores para el formulario
        return view('ordenes.edit', compact('orden', 'proveedores'));
    }

    // Actualiza una orden existente en la base de datos
    public function update(Request $request, Orden $orden)
    {
        // Valida los datos de entrada
        $validated = $request->validate([
            'numero_orden' => 'required|unique:ordenes,numero_orden,' . $orden->id,
            'proveedor_id' => 'required|exists:proveedores,id',
            'estado' => 'required',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        // Actualiza la orden
        $orden->update($validated);

        return redirect()->route('ordenes.index')->with('status', 'Orden actualizada exitosamente');
    }

    // Elimina una orden existente de la base de datos
    public function destroy(Orden $orden)
    {
        $orden->delete();

        return redirect()->route('ordenes.index')->with('success', 'Orden eliminada exitosamente.');
    }
}
