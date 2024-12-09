<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class OrdenController extends Controller
{

    # metodos de acceso a las vista de COMPRA

    public function indexCompra() {
        $ordenes = Orden::latest()->paginate(10); 
        return view('ordenes.compra.index', compact('ordenes'));
    }
    
    public function createCompra() { 

        $productos = Producto::all();
        $proveedores = Proveedor::all();

        return view('ordenes.compra.create', compact('productos', 'proveedores')); 
    }

    public function storeCompra(Request $request)
    {
        
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'proveedor_id' => 'required|exists:proveedores,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|in:pendiente,completada,cancelada',
            'fecha' => 'required|date',
            'tipo' => 'required'
        ]);

        // Obtener el producto y calcular el subtotal
        $producto = Producto::findOrFail($validated['producto_id']);
        $subtotal = $producto->precio * $validated['cantidad'];

        // Crear la orden
        $orden = Orden::create([
            'nombre' => $validated['nombre'] ?? null,
            'proveedor_id' => $validated['proveedor_id'],
            'estado' => $validated['estado'],
            'fecha' => $validated['fecha'],
            'total' => $subtotal,
        ]);

        // Asociar el producto a la orden
        $orden->productos()->attach($producto->id, [
            'cantidad' => $validated['cantidad'],
            'subtotal' => $subtotal,
        ]);

        return redirect()->route('ordenes.compra.index')->with('success', 'Orden agregada exitosamente');
    }

    public function editCompra(Orden $orden) { return view('ordenes.compra.edit', ['orden' => $orden]); }

    public function updateCompra(Request $request, Orden $orden) {
        
        $validated = $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'estado' => 'required',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $orden->update($validated);
        return redirect()->route('ordenes.compra.index')->with('status', 'Orden actualizada exitosamente');
    
    }

    public function destroyCompra(Orden $orden) {
        $orden->delete();
        return redirect()->route('ordenes.compra.index')->with('success', 'Orden eliminada exitosamente.');
    }


    # metodos de acceso a las vista de VENTA

    public function indexVenta() {
        $ordenes = Orden::latest()->paginate(10); 
        return view('ordenes.venta.index', compact('ordenes'));
    }

}
