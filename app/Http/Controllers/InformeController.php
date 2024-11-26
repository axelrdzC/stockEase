<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Informe;
use Illuminate\Http\Request;
use App\Services\Informes;

class InformeController extends Controller
{

    protected $informeService;

    public function __construct(Informes $informeService) {
        $this->informeService = $informeService;
    }

    public function index() {
        $informes = Informe::latest()->paginate(10);
        return view('informes.index', compact('informes'));
    }

    public function create() { return view('informes.create'); }

    public function store(Request $request) {

        $validated = $request->validate([
            'nombre' => ['nullable'],
            'descripcion' => ['nullable'],
            'tipo_informe' => ['required'],
            'almacen' => ['nullable', 'exists:almacenes,id'], 
        ]);

        $informe = Informe::create([
            'nombre' => $validated['nombre'] ?? 'Informe sin nombre',
            'descripcion' => $validated['descripcion'],
            'tipo_informe' => $validated['tipo_informe'],
        ]);

        $datos = $this->informeService->generarDatos($validated['tipo_informe'], $validated['almacen'] ?? null);

        return redirect()->route('informes.show', $informe->id)->with('datos', $datos)->with('success', 'Informe agregado exitosamente');
    }

    public function show(Informe $informe) {

        # retorna la vista de informe con los datos generados
        $datos = session('datos', $this->informeService->generarDatos($informe->tipo_informe));

        return view('informes.show', [
            'informe' => $informe,
            'datos' => $datos,
        ]);
    }
    
    public function exportPDF($id) {
    
        $informe = Informe::findOrFail($id);

        $datos = $this->informeService->generarDatos($informe->tipo_informe);
    
        $pdf = PDF::loadView('informes.pdf', compact('informe', 'datos'));
        return $pdf->download('informe.pdf');
    }
    
}