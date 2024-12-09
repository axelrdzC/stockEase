<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Producto;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;


class ProductoController extends Controller
{
    use \OwenIt\Auditing\Auditable;

    # CRUD

    public function index() {
        $productos = Producto::latest()->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create() { return view('productos.create'); }

    public function store(Request $request) {
        
        $request->validate([
            'nombre' => ['required'],
            'descripcion' => ['required'],
            'sku' => ['required'],
            'unidad_medida' => ['required'],
            'precio' => ['required'],
            'cantidad_producto' => ['required'],
            'img' => ['sometimes','nullable','mimes:png.jpg,jpge','max:2048'],
            'almacen_id' => ['required'],
            'proveedor_id' => ['required'],
            'categoria_id' => ['required'],
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

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));

    }

    # borrar x productos seleccionados mediante un checkbox
    public function destroyAll(Request $request) {

        $productosSeleccionados = $request->input('productos_seleccionados'); 

        // turn la cadena a un array
        $productosArray = explode(',', $productosSeleccionados);
        $productosArray = array_map('intval', $productosArray);

        Producto::whereIn('id', $productosArray)->delete();

        return redirect()->back()->with('success', 'Acción realizada con éxito.');

    }

    # mover a otra seccion dentro de un mismo almacen
    public function moveToSection(Request $request, $seccion)
    {
        $seccion = Seccion::find($seccion);
    
        if (!$seccion) {
            return redirect()->back()->with('error', 'Sección no encontrada');
        }
        
        $productosSeleccionados = $request->input('productos_seleccionados');
        
        // turn la cadena a un array
        $productosArray = explode(',', $productosSeleccionados);
        $productosArray = array_map('intval', $productosArray);

        // actualiza chava
        Producto::whereIn('id', $productosArray)->update(['seccion_id' => $seccion->id]);

        return redirect()->back()->with('success', 'Productos movidos a la sección ' . $seccion->nombre);
    }

    # mover a otro almacen y tirarlo en productos sin seccion x q ya no tenemos tiempo para mas
    public function moveToAlmacen(Request $request, $almacen)
    {
        $almacen = Almacen::find($almacen);
    
        if (!$almacen) {
            return redirect()->back()->with('error', 'Este almacén no existe.');
        }
    
        $productosSeleccionados = $request->input('productos_seleccionados');
        
        $productosArray = explode(',', $productosSeleccionados);
        $productosArray = array_map('intval', $productosArray);
    
        $productos = Producto::whereIn('id', $productosArray)->get();
    
        Producto::whereIn('id', $productosArray)->update(['almacen_id' => $almacen->id]);
    
        foreach ($productos as $producto) {
            // Si el producto tiene una sección asignada, eliminar la relación
            if ($producto->seccion) {
                // Solo eliminar la relación si la sección pertenece a otro almacén
                if ($producto->seccion->almacen_id !== $almacen->id) {
                    $producto->seccion()->dissociate(); 
                    $producto->save(); 
                }
            }
        }
    
        return redirect()->back()->with('success', 'Productos movidos al almacén ' . $almacen->nombre);
    }
    
}