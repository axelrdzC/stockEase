<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datos = DB::table('productos')
        ->selectRaw('MONTH(created_at) as mes, SUM(cantidad_producto) as total_stock')
        ->groupBy('mes')
        ->pluck('total_stock', 'mes')
        ->toArray();

        // Crear un array con los valores de cada mes
        $stockMensual = [];
        for ($i = 1; $i <= 12; $i++) {
            $stockMensual[] = $datos[$i] ?? 0; // Si no hay datos, colocar 0
        }
        return view('home', compact('stockMensual'));
    }

}
