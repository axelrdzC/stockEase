<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;


class ProductoController extends Controller
{

    public function index() {
        $productos = Producto::latest()->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function createGeneral() { return view('productos.create.general'); }

    public function storeGeneral(Request $request) {
        
        $validated = $request->validate([
            'nombre' => ['required'],
            'descripcion' => ['required'],
            'sku' => ['required'],
            'unidad_medida' => ['required'],
            'precio' => ['required'],
            'cantidad_producto' => ['required'],
            'almacen_id' => ['required'],
            'proveedor_id' => ['required'],
            'categoria_id' => ['required'],
        ]);

        Producto::create($validated);
    
        return redirect()->route('productos.index')->with('success', 'Producto agregado exitosamente');
    }
    
    

    public function edit(Producto $producto) {
        return view('productos.edit', ['producto' => $producto]);
    }

    public function update(Request $request, Producto $producto) {
    
        # pasar igual el codigo sku pues no se modifica
        $validated['sku'] = $producto->sku;
        $validated = $request->validate([
            'nombre' => ['required'],
            'descripcion' => ['required'],
            'unidad_medida' => ['required'],
            'precio' => ['required'],
            'cantidad_producto' => ['required'],
            'almacen_id' => ['required'],
            'proveedor_id' => ['required'],
            'categoria_id' => ['required'],
        ]);
    
        $producto->update($validated);
    
        return redirect()->route('productos.index')->with('status', 'Producto modificado exitosamente');
    }
    
    
    

    public function destroy(Producto $producto) {

        $producto->delete();
        return redirect()->route('productos.index')->with('status', 'el producto ha sido eliminado');
    }

}