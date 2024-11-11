<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'descripcion', 
        'sku',
        'unidad_medida',
        'precio',
        'cantidad_producto',
        'almacen_id',
        'proveedor_id',
        'categoria_id'
    ];

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'almacen_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    
}