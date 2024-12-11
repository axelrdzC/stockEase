<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
        $validated = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'proveedor_id' => 'required|exists:proveedores,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|in:pendiente,completada,cancelada',
            'fecha' => 'required|date',
            'tipo' => 'required'
        ]);
    
        // Obtén el producto relacionado
        $producto = Producto::findOrFail($validated['producto_id']);
    
        // Calcula el total
        $precio = $producto->precio;
        $total = $validated['cantidad'] * $precio;
        $validated['total'] = $total;
    
        // Incrementa la cantidad del producto
        $producto->cantidad_producto += $validated['cantidad'];
        $producto->save(); // Guarda los cambios
    
        // Crea la orden
        Orden::create($validated);
    
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

    public function createVenta() { 

        $productos = Producto::all();
        $clientes = Cliente::all();

        return view('ordenes.venta.create', compact('productos', 'clientes')); 
    }

    public function storeVenta(Request $request)
    { 
        $validated = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|in:pendiente,completada,cancelada',
            'fecha' => 'required|date',
            'tipo' => 'required|in:venta',
        ]);

        $producto = Producto::findOrFail($validated['producto_id']);

        if ($producto->cantidad_producto < $validated['cantidad']) {
            return redirect()->route('ordenes.venta.index')
                ->with('error', 'No hay suficiente inventario para completar la venta');
        }

        $precio = $producto->precio;
        $total = $validated['cantidad'] * $precio;
        $validated['total'] = $total;

        $producto->cantidad_producto -= $validated['cantidad'];
        $producto->save();

        Orden::create($validated);

        return redirect()->route('ordenes.venta.index')->with('success', 'Orden de venta agregada exitosamente');
    }


}
