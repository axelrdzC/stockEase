<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;


class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::latest()->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function createGeneral() { return view('productos.create.general'); }

    public function storeGeneral(Request $request)
    {
        $dataGeneral = new Producto;
        $dataGeneral-> nombre = $request->input('nombre');
        $dataGeneral-> sku = $request->input('sku');
        $dataGeneral-> categoria_id = $request->input('categoria');
        $dataGeneral-> precio = $request->input('precio');
        $dataGeneral-> unidad_medida = $request->input('unidad_medida');
        $dataGeneral-> descripcion = $request->input('descripcion');

        Producto::create([
            'nombre' => $dataGeneral['nombre'],
            'sku' => $dataGeneral['sku'],
            'categoria_id' => $dataGeneral['categoria_id'],
            'precio' => $dataGeneral['precio'],
            'unidad_medida' => $dataGeneral['unidad_medida'],
            'descripcion' => $dataGeneral['descripcion'],
        ]);

        return redirect()->route('productos.index')->with('success', 'producto agregado exitosamente');
    }

    public function destroy(Producto $producto) {

        $producto->delete();
        return redirect()->route('productos.index')->with('status', 'el producto ha sido eliminado');
    }

}