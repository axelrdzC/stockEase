<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;


class HomeProductosComponent extends Component
{

    public $productoFiltro = 'nivel_alto_stock';

    public function render()
    {
        $querito = Producto::query();

        if ($this->productoFiltro == 'nivel_bajo_stock') {
            $querito->orderBy('cantidad_producto', 'asc')->take(10);
        } elseif ($this->productoFiltro == 'nivel_alto_stock') {
            $querito->orderBy('cantidad_producto', 'desc')->take(10);
        }

        $productos = $querito->get();

        return view('livewire.homeProductos-component', compact('productos'));
    }

}
