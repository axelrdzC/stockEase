<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;


class ProductoController extends Controller
{
    use \OwenIt\Auditing\Auditable;

    public function index() {
        $productos = Producto::latest()->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create() { return view('productos.create'); }

    public function store(Request $request) {
        
        $request->validate([
            'nombre' => 'required|string|max:255', 
            'descripcion' => 'required|string|max:1000', 
            'sku' => 'required|string|max:50|unique:productos,sku', 
            'unidad_medida' => 'required|string|in:unidad,kilogramo,litro,pieza', 
            'precio' => 'required|numeric|min:0', 
            'cantidad_producto' => 'required|integer|min:1', 
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
            'almacen_id' => 'required|exists:almacenes,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'categoria_id' => 'required|exists:categorias,id',
        ], [
           
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'sku.required' => 'El SKU es obligatorio.',
            'sku.unique' => 'Este SKU ya está registrado.',
            'unidad_medida.required' => 'La unidad de medida es obligatoria.',
            'unidad_medida.in' => 'La unidad de medida debe ser unidad, kilogramo, litro o pieza.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'cantidad_producto.required' => 'La cantidad es obligatoria.',
            'cantidad_producto.integer' => 'La cantidad debe ser un número entero.',
            'cantidad_producto.min' => 'La cantidad debe ser al menos 1.',
            'img.image' => 'El archivo debe ser una imagen válida.',
            'img.mimes' => 'La imagen debe ser de tipo jpg, jpeg, png o gif.',
            'img.max' => 'La imagen no puede exceder los 2 MB.',
            'almacen_id.required' => 'El almacén es obligatorio.',
            'almacen_id.exists' => 'El almacén seleccionado no existe.',
            'proveedor_id.required' => 'El proveedor es obligatorio.',
            'proveedor_id.exists' => 'El proveedor seleccionado no existe.',
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'sku' => 'required|string|max:50|unique:productos,sku,' . $producto->id,
            'unidad_medida' => 'required|string|in:unidad,kilogramo,litro,pieza',
            'precio' => 'required|numeric|min:0',
            'cantidad_producto' => 'required|integer|min:1',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'almacen_id' => 'required|exists:almacenes,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'categoria_id' => 'required|exists:categorias,id',
        ], [
          
            'sku.unique' => 'Este SKU ya está registrado en otro producto.',
        ]);
        

        if ($request->hasFile('img')) {

            if ($producto->img && $producto->img !== '/storage/img/almacen.png') {
                Storage::disk('public')->delete($producto->img);
            }

            $nombre = $producto->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/proveedores', $nombre, 'public');
            $producto->img = '/storage/img/proveedores/'.$nombre;

        }

        $producto->save();
        $producto->update($request->input());
    
        return redirect()->route('productos.index')->with('status', 'Producto modificado exitosamente');
    }    

    public function destroy(Producto $producto) {

        $producto->delete();
        return redirect()->route('productos.index')->with('status', 'el producto ha sido eliminado');
    }

    public function destroyAll(Request $request) {

        $productoIds = $request->input('productos'); // Productos seleccionados
        // Realiza alguna acción con los productos seleccionados
        // Ejemplo: Eliminar productos seleccionados
        Producto::whereIn('id', $productoIds)->delete();

        return redirect()->back()->with('success', 'Acción realizada con éxito.');

    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));

    }

}