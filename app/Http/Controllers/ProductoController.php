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
        $dataGeneral = new Producto;
        $dataGeneral-> nombre = $request->input('nombre');
        $dataGeneral-> descripcion = $request->input('descripcion');
        $dataGeneral-> sku = $request->input('sku');
        $dataGeneral-> unidad_medida = $request->input('unidad_medida');
        $dataGeneral-> precio = $request->input('precio');
        $dataGeneral-> cantidad_producto = $request->input('cantidad_producto');
        $dataGeneral-> almacen_id = $request->input('almacen');
        $dataGeneral-> proveedor_id = $request->input('proveedor');
        $dataGeneral-> categoria_id = $request->input('categoria');

        Producto::create([
            'nombre' => $dataGeneral['nombre'],
            'descripcion' => $dataGeneral['descripcion'],
            'sku' => $dataGeneral['sku'],
            'unidad_medida' => $dataGeneral['unidad_medida'],
            'precio' => $dataGeneral['precio'],
            'cantidad_producto' => $dataGeneral['cantidad_producto'],
            'almacen_id' => $dataGeneral['almacen_id'],
            'proveedor_id' => $dataGeneral['proveedor_id'],
            'categoria_id' => $dataGeneral['categoria_id'],
        ]);

        return redirect()->route('productos.index')->with('success', 'producto agregado exitosamente');
    }

    public function edit(Producto $producto) {
        return view('productos.edit', ['producto' => $producto]);
    }

    public function update(Request $request, Producto $producto) {

        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->unidad_medida = $request->input('unidad_medida');
        $producto->precio = $request->input('precio');
        $producto->cantidad_producto = $request->input('cantidad_producto');
        $producto->almacen_id = $request->input('almacen');
        $producto->proveedor_id = $request->input('proveedor');
        $producto->categoria_id = $request->input('categoria');
        
        $producto->save();

        return redirect()->route('productos.index')->with('status', 'producto modificado exitosamente');
    }

    public function destroy(Producto $producto) {

        $producto->delete();
        return redirect()->route('productos.index')->with('status', 'el producto ha sido eliminado');
    }

}