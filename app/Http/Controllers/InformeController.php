<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InformeController extends Controller
{
    public function index() {
        $informes = Informe::latest()->paginate(10);
        return view('informes.index', compact('informes'));
    }

    public function create() { return view('informes.create'); }

    public function show(Informe $informe) {
        return view('informes.show', [
            'informe' => $informe
        ]);
    }

    public function export(Informe $informe){
        $pdf = PDF::loadView('informes.pdf', compact('informe'));
        return $pdf->download('informe.pdf');
    }
}