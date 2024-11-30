<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlmacenController extends Controller {

    # bloquear edicion / creacion / eliminacion para empleados normales
    public function __construct() {
        $this->middleware('can:crear almacenes', [
            'only' => [
                'create', 'store'
            ],
        ]);
        $this->middleware('can:editar almacenes', [
            'only' => [
                'edit', 'update'
            ],
        ]);
        $this->middleware('can:eliminar almacenes', [
            'only' => [
                'destroy'
            ],
        ]);
    }
    
    public function index() {
        return view('almacenes.index');
    }

    public function create(){ return view('almacenes.create'); }

    public function store(Request $request) {
        
        $request->validate([
            'nombre' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'colonia' => 'required',
            'codigo_p' => 'required',
            'seccion' => 'nullable',
            'capacidad' => 'nullable',
            'img'=>'nullable|image'
        ]);

        $almacen = Almacen::create($request->all());

        if ($request->hasFile('img')) {
            $nombre = $almacen->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/almacenes', $nombre, 'public');
            $almacen->img = '/storage/img/almacenes/'.$nombre;
        } else {
            $almacen->img = '/storage/img/almacen.png';
        }
        
        $almacen->save();

        return redirect()->route('almacenes.index')->with('success', 'almacen agregado exitosamente');
    }

    public function edit(Almacen $almacen) {
        return view('almacenes.edit', ['almacen' => $almacen]);
    }

    public function update(Request $request, Almacen $almacen) {
    
        $request->validate([
            'nombre' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'colonia' => 'required',
            'codigo_p' => 'required',
            'capacidad' => 'required',
            'img'=>'nullable|image'
        ]);

        if ($request->hasFile('img')) {

            if ($almacen->img && $almacen->img !== '/storage/img/almacen.png') {
                Storage::disk('public')->delete($almacen->img);
            }

            $nombre = $almacen->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/almacenes', $nombre, 'public');
            $almacen->img = '/storage/img/almacenes/'.$nombre;

        }

        $almacen->save();
        $almacen->update($request->input());
    
        return redirect()->route('almacenes.index')->with('status', 'almacen modificado exitosamente');
    }

    public function destroy(Almacen $almacen) {

        $almacen->delete();
        return redirect()->route('almacenes.index')->with('status', 'el almacen ha sido eliminado');
        
    }

    public function show(Almacen $almacen) {
        return view('almacenes.show', [
            'almacen' => $almacen
        ]);
    }
}