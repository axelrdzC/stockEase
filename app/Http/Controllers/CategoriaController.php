<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;


class CategoriaController extends Controller
{

    public function index() {
        $categorias = Categoria::latest()->paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    public function create() { return view('categorias.create'); }

    public function store(Request $request) {
        $nwCategoria = new Categoria;
        $nwCategoria-> nombre = $request->input('nombre');
        $nwCategoria-> descripcion = $request->input('descripcion');

        $nwCategoria->save();

        return redirect()->route('productos.create')->with('success', 'categoria agregada exitosamente');
    }

    public function edit(Categoria $categoria) {
        
    }

    public function update(Request $request, Categoria $categoria) {

        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        
        $categoria->save();

        #return redirect()->route('productos.index')->with('status', 'producto modificado exitosamente');
    }

    public function destroy(Categoria $categoria) {
        $categoria->delete();
        #return redirect()->route('productos.index')->with('status', 'el producto ha sido eliminado');
    }

}