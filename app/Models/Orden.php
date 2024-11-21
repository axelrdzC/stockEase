<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    
    protected $fillable = [
        'titulo',
        'fecha'
    ];
    
}