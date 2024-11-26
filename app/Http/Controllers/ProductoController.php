<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductoController extends Controller
{

    public function index() {
        $productos = Producto::latest()->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create() { return view('productos.create'); }

    public function store(Request $request) {
        
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'sku' => 'required',
            'unidad_medida' => 'required',
            'precio' => 'required',
            'cantidad_producto' => 'required',
            'almacen_id' => 'required',
            'proveedor_id' => 'required',
            'categoria_id' => 'required',
            'img' => 'nullable|image', 
        ]);

        $producto = Producto::create($request->all());

        if ($request->hasFile('img')) {
            $nombre = $producto->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/productos', $nombre, 'public');
            $producto->img = '/storage/img/productos/'.$nombre;
            $producto->save();
        }
    
        return redirect()->route('productos.index')->with('success', 'Producto agregado exitosamente');
    }
    
    

    public function edit(Producto $producto) {
        return view('productos.edit', ['producto' => $producto]);
    }

    public function update(Request $request, Producto $producto) {
    
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidad_medida' => 'required',
            'precio' => 'required',
            'cantidad_producto' => 'required',
            'almacen_id' => 'required',
            'proveedor_id' => 'required',
            'categoria_id' => 'required',
            'sku' => 'required',
            'img' => 'nullable|image', 
        ]);
    
        if ($request->hasFile('img')) {
            Storage::disk('public')->delete($producto->img);
            $nombre = $producto->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/productos', $nombre, 'public');
            $producto->img = '/storage/img/productos/'.$nombre;
            $producto->save();
        }

        $producto->update($request->input());
    
        return redirect()->route('productos.index')->with('status', 'Producto modificado exitosamente');
    }
    

    public function destroy(Producto $producto) {

        $producto->delete();
        return redirect()->route('productos.index')->with('status', 'el producto ha sido eliminado');
    }

}