<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Producto extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'nombre', 
        'descripcion', 
        'sku', 
        'unidad_medida', 
        'precio', 
        'cantidad_producto', 
        'img',
        'almacen_id', 
        'seccion_id', 
        'proveedor_id', 
        'categoria_id'
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'almacen_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    
    public function proveedor() {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
    
}