<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';
    
    protected $fillable = [
        'numero_orden',
        'proveedor_id',
        'estado',
        'fecha',
        'total',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}