<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventario'; 

    protected $fillable = [
        'id_productos',
        'id_almacen',
        'cantidad_actual',
        'stock_min',
    ];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con el modelo Almacen
    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    // Método para verificar si el stock está por debajo del mínimo
    public function isStockLow()
    {
        return $this->cantidad_producto < $this->stock_min;
    }
}
