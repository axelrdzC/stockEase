<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Almacen;
use App\Models\Producto;

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
        $datosMensuales = DB::table('productos')
        ->selectRaw('MONTH(created_at) as mes, SUM(cantidad_producto) as total_stock')
        ->groupBy('mes')
        ->pluck('total_stock', 'mes')
        ->toArray();

        // Crear un array con los valores de cada mes
        $stockMensual = [];
        for ($i = 1; $i <= 12; $i++) {
            $stockMensual[] = $datosMensuales[$i] ?? 0; // Si no hay datos, colocar 0
        }

        $inicio = '2023';
        $actual = date('Y');

        $datosAnuales = DB::table('productos')
        ->selectRaw('YEAR(created_at) as year, SUM(cantidad_producto) as total_stock')
        ->whereYear('created_at', '>=', $inicio)
        ->groupBy('year')
        ->pluck('total_stock', 'year')
        ->toArray();

        $categoriaDeAnios = range($inicio, $actual);
        $stockDesdeElPrincipio = [];
        foreach ($categoriaDeAnios as $anios) {
            $stockDesdeElPrincipio[] = $datosAnuales[$anios] ?? 0;
        }

        $almacenes = Almacen::all()->map(function ($almacen) {
            $productos = Producto::where('almacen_id', $almacen->id)->get();
            $almacen->porcentaje = $productos->sum('cantidad_producto') / $almacen->capacidad * 100;
            return $almacen;
        });

        return view('home', compact('stockMensual', 'categoriaDeAnios', 'stockDesdeElPrincipio', 'almacenes'));
    }

}
