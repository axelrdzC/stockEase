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

    public function __construct()
    {
        $this->middleware('can:crear almacenes', ['only' => ['create', 'store']]);
        $this->middleware('can:editar almacenes', ['only' => ['edit', 'update']]);
        $this->middleware('can:eliminar almacenes', ['only' => ['destroy']]);
    }

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
            'nombre' => 'required|string|max:255',
            'pais' => 'required|string',
            'estado' => 'required|string',
            'ciudad' => 'required|string',
            'codigo_p' => 'required|integer',
            'colonia' => 'required|string',
            'capacidad' => 'required|integer',
            'secciones.*.nombre' => 'nullable|string|max:255',
            'secciones.*.capacidad' => 'nullable|integer|min:1',
        ]);
        

        $almacen = Almacen::create($request->only([
            'nombre', 'pais', 'estado', 'ciudad', 'colonia', 'codigo_p', 'capacidad'
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
            'nombre' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'colonia' => 'required',
            'codigo_p' => 'required',
            'capacidad' => 'required',
            'img' => 'nullable|image',
            'secciones' => 'nullable|array', // Validación para las secciones
            'secciones.*.id' => 'nullable|integer|exists:secciones,id',
            'secciones.*.nombre' => 'required|string',
            'secciones.*.capacidad' => 'required|integer',
        ]);

        $almacen->update($request->only([
            'nombre', 'pais', 'estado', 'ciudad', 'colonia', 'codigo_p', 'capacidad'
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
        // Eliminar secciones asociadas
        $almacen->secciones()->delete();

        // Eliminar imagen si no es la predeterminada
        if ($almacen->img && $almacen->img !== '/storage/img/almacen.png') {
            Storage::disk('public')->delete(str_replace('/storage/', '', $almacen->img));
        }

        $almacen->delete();
        return redirect()->route('almacenes.index')->with('status', 'El almacén ha sido eliminado');
    }

    public function show(Almacen $almacen) {

        $productos = Producto::where('almacen_id', $almacen->id)->get();
        $secciones = $almacen->secciones; 

        $data = $secciones->pluck('capacidad')->toArray();
        $categories = $secciones->pluck('nombre')->toArray();

        $log = Audit::where('auditable_id', $almacen->id)
                    ->where('auditable_type', Almacen::class)
                    ->where('event', 'created')
                    ->latest()
                    ->first();
        $theCreador = $log ? User::find($log->user_id) : null;

        return view('almacenes.show', compact('almacen', 'theCreador', 'data', 'categories', 'secciones', 'productos'));

    }
}