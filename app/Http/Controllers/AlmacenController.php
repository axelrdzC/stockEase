<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use OwenIt\Auditing\Models\Audit;
use App\Models\Almacen;
use App\Models\Seccion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlmacenController extends Controller
{
    use \OwenIt\Auditing\Auditable;

    # dar acceso solo a los q tienen los permisos
    public function __construct()
    {
        $this->middleware('can:crear almacenes', ['only' => ['create', 'store']]);
        $this->middleware('can:editar almacenes', ['only' => ['edit', 'update']]);
        $this->middleware('can:eliminar almacenes', ['only' => ['destroy']]);
    }


    # CRUD

    public function index()
    {
        $almacenes = Almacen::with('secciones')->get();
        return view('almacenes.index', compact('almacenes'));
    }

    public function create()
    {
        return view('almacenes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:almacenes', 
            'ubicacion' => 'required|string|regex:/^[\pL\s0-9,]+$/u|max:255', 
            'capacidad' => 'required|integer|min:1', 
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
            'secciones' => 'nullable|array', 
            'secciones.*.nombre' => 'nullable|string|max:255|distinct', 
            'secciones.*.capacidad' => 'nullable|integer|min:1|max:' . ($request->capacidad ?? '999999'), 
        ], [
           
            'nombre.required' => 'El nombre del almacén es obligatorio.',
            'nombre.unique' => 'Ya existe un almacén con este nombre.',
            'ubicacion.required' => 'El campo ubicacion es obligatorio.',
            'ubicacion.regex' => 'El campo ubicacion solo puede contener letras, números y espacios.',
            'capacidad.required' => 'La capacidad del almacén es obligatoria.',
            'capacidad.integer' => 'La capacidad del almacén debe ser un número entero.',
            'capacidad.min' => 'La capacidad del almacén debe ser al menos 1.',
            'img.image' => 'El archivo debe ser una imagen válida.',
            'img.mimes' => 'La imagen debe ser de tipo jpg, jpeg, png o gif.',
            'img.max' => 'La imagen no puede exceder los 2 MB.',
            'secciones.array' => 'Las secciones deben enviarse como un arreglo.',
            'secciones.*.id.exists' => 'La sección seleccionada no existe.',
            'secciones.*.nombre.required' => 'El nombre de la sección es obligatorio.',
            'secciones.*.nombre.distinct' => 'Cada sección debe tener un nombre único.',
            'secciones.*.capacidad.required' => 'La capacidad de la sección es obligatoria.',
            'secciones.*.capacidad.min' => 'La capacidad de una sección debe ser al menos 1.',
            'secciones.*.capacidad.max' => 'La capacidad de una sección no puede ser mayor a la del almacén.',
        ]);
        
        
        

        $almacen = Almacen::create($request->only([
            'nombre', 'ubicacion', 'capacidad'
        ]));

        // Guardar imagen si se proporciona
        if ($request->hasFile('img')) {
            $nombre = $almacen->id . '.' . $request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/almacenes', $nombre, 'public');
            $almacen->img = '/storage/' . $img;
            $almacen->save();
        } else {
            $almacen->img = '/storage/img/almacen.png';
        }

        // Crear secciones si se proporcionan
        if ($request->has('secciones')) {
            foreach ($request->input('secciones') as $seccionData) {
                $almacen->secciones()->create($seccionData);
            }
        }

        return redirect()->route('almacenes.index')->with('success', 'Almacén agregado exitosamente');
    }

    public function edit(Almacen $almacen)
    {
        return view('almacenes.edit', ['almacen' => $almacen]);
    }

    public function update(Request $request, Almacen $almacen)
    { 
        $request->validate([
            'nombre' => 'required|string|max:255|unique:almacenes,nombre,' . $almacen->id, 
            'ubicacion' => 'required|string|regex:/^[\pL\s0-9,]+$/u|max:255',
            'capacidad' => 'required|integer|min:1', 
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
            'secciones' => 'nullable|array', 
            'secciones.*.id' => 'nullable|integer|exists:secciones,id', 
            'secciones.*.nombre' => 'required|string|max:255|distinct', 
            'secciones.*.capacidad' => 'required|integer|min:1|max:' . ($request->capacidad ?? $almacen->capacidad), 
        ], [
            
            'nombre.required' => 'El nombre del almacén es obligatorio.',
            'nombre.unique' => 'Ya existe un almacén con este nombre.',
            'ubicacion.required' => 'El campo ubicacion es obligatorio.',
            'ubicacion.regex' => 'El campo ubicacion solo puede contener letras, números, espacios y comas.',
            'capacidad.required' => 'La capacidad del almacén es obligatoria.',
            'capacidad.integer' => 'La capacidad del almacén debe ser un número entero.',
            'capacidad.min' => 'La capacidad del almacén debe ser al menos 1.',
            'img.image' => 'El archivo debe ser una imagen válida.',
            'img.mimes' => 'La imagen debe ser de tipo jpg, jpeg, png o gif.',
            'img.max' => 'La imagen no puede exceder los 2 MB.',
            'secciones.array' => 'Las secciones deben enviarse como un arreglo.',
            'secciones.*.id.exists' => 'La sección seleccionada no existe.',
            'secciones.*.nombre.required' => 'El nombre de la sección es obligatorio.',
            'secciones.*.nombre.distinct' => 'Cada sección debe tener un nombre único.',
            'secciones.*.capacidad.required' => 'La capacidad de la sección es obligatoria.',
            'secciones.*.capacidad.min' => 'La capacidad de una sección debe ser al menos 1.',
            'secciones.*.capacidad.max' => 'La capacidad de una sección no puede ser mayor a la del almacén.',
        ]);
        

        $almacen->update($request->only([
            'nombre', 'ubicacion', 'capacidad'
        ]));

        // Actualizar imagen si se proporciona una nueva
        if ($request->hasFile('img')) {
            if ($almacen->img && $almacen->img !== '/storage/img/almacen.png') {
                Storage::disk('public')->delete(str_replace('/storage/', '', $almacen->img));
            }
            $nombre = $almacen->id . '.' . $request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/almacenes', $nombre, 'public');
            $almacen->img = '/storage/' . $img;
            $almacen->save();
        }

        // Actualizar o crear secciones
        if ($request->has('secciones')) {
            foreach ($request->input('secciones') as $seccionData) {
                if (isset($seccionData['id'])) {
                    // Actualizar sección existente
                    $seccion = Seccion::find($seccionData['id']);
                    $seccion->update($seccionData);
                } else {
                    // Crear nueva sección
                    $almacen->secciones()->create($seccionData);
                }
            }
        }

        return redirect()->route('almacenes.index')->with('status', 'Almacén modificado exitosamente');
    }

    public function destroy(Almacen $almacen)
    {
        # delete asociated secciones
        $almacen->secciones()->delete();

        # eliminar img del storage si es personalizade
        if ($almacen->img && $almacen->img !== '/storage/img/almacen.png') {
            Storage::disk('public')->delete(str_replace('/storage/', '', $almacen->img));
        }

        $almacen->delete();
        return redirect()->route('almacenes.index')->with('status', 'El almacén ha sido eliminado');
    }

    public function show(Almacen $almacen) {

        $almacenes = Almacen::all()->filter(function ($a) use ($almacen) {
            return $a->id !== $almacen->id;  // excluir el almacen actual
        });
        $productos = Producto::where('almacen_id', $almacen->id)->get();
        $secciones = $almacen->secciones; 

        # para productos asignado a alguna seccion get nombres y espacio ocupado por todos sus productos
        $seccionados = $secciones->map(function ($seccion) {
            return [
                'nombre' => $seccion->nombre,
                'capacidad' => $seccion->productos->sum('cantidad_producto'),
            ];
        });

        $seccionadosEspacio = $secciones->map(function ($seccion) {
            return [
                'nombre' => $seccion->nombre,
                'capacidad' => $seccion->capacidad,
            ];
        });

        # para productos sin seccion get productos, sumar su cantidad para obtener la capacidad
        $noSeccionados = $productos->filter(function ($producto) {
            return $producto->seccion_id === null;
        });
        $capacidadNoSeccionados = $noSeccionados->sum('cantidad_producto');

        $capacidad = $seccionados->pluck('capacidad')->toArray();
        $apartado = $seccionadosEspacio->pluck('capacidad')->toArray();
        $nombreSeccion = $seccionados->pluck('nombre')->toArray();

        $capacidadTotalUsada = array_sum(array: $capacidad) + $capacidadNoSeccionados;
        $pCapacidad = round(($capacidadTotalUsada / $almacen->capacidad ) * 100, 2);
        
        $log = Audit::where('auditable_id', $almacen->id)
                    ->where('auditable_type', Almacen::class)
                    ->where('event', 'created')
                    ->latest()
                    ->first();
        $theCreador = $log ? User::find($log->user_id) : null;

        return view('almacenes.show', 
        compact(
            'almacen', 
            'theCreador', 
            'capacidad', 
            'apartado', 
            'nombreSeccion', 
            'secciones', 
            'productos', 
            'capacidadNoSeccionados', 
            'pCapacidad', 
            'noSeccionados',
            'almacenes'));

    }

}