<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Proveedor; // Para obtener la lista de proveedores
use Illuminate\Http\Request;

class OrdenController extends Controller
{

    # metodos de acceso a las vista de COMPRA

    public function indexCompra() {
        $ordenes = Orden::latest()->paginate(10); 
        return view('ordenes.compra.index', compact('ordenes'));
    }
    
    public function createCompra() { return view('ordenes.compra.create'); }

    public function storeCompra(Request $request) {

        $validated = $request->validate([
            'numero_orden' => 'required|unique:ordenes,numero_orden',
            'proveedor_id' => 'required|exists:proveedores,id',
            'estado' => 'required',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        Orden::create($validated);
        return redirect()->route('ordenes.compra.index')->with('success', 'Orden agregada exitosamente');

    }

    public function editCompra(Orden $orden) { return view('ordenes.compra.edit', ['orden' => $orden]); }

    public function updateCompra(Request $request, Orden $orden) {
        
        $validated = $request->validate([
            'numero_orden' => 'required|unique:ordenes,numero_orden,' . $orden->id,
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
