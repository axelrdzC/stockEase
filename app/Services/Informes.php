<?php

namespace App\Services;

use App\Models\Producto;

class Informes {

    public function generarDatos($tipoInforme, $almacenId = null)
    {
        switch ($tipoInforme) {
            case 'stock':
                return Producto::where('cantidad_producto', '>', 0)->get();
    
            case 'index':
                if ($almacenId) {
                    return Producto::where('almacen_id', $almacenId)->get();
                }
                return collect();
    
            default:
                return collect();
        }
    }
}
