<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Categoria;


class ProductosComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $order = '';
    public $category = '';
    public $price = '';
    public $stock = '';

    public function render()
    {
        $querito = Producto::query();

        if ($this->category) {
            $querito->where('categoria_id', '=', $this->category);
        }

        if ($this->order == 'asc') {
            $querito->orderBy('nombre', 'asc');
        } elseif ($this->order == 'desc') {
            $querito->orderBy('nombre', 'desc');
        } elseif ($this->order == 'price_asc') {
            $querito->orderBy('precio', 'asc');
        } elseif ($this->order == 'price_desc') {
            $querito->orderBy('precio', 'desc');
        }

        if ($this->price == 1) {
            $querito->whereBetween('precio', [0.01, 200.00]);
        } elseif ($this->price == 2) {
            $querito->whereBetween('precio', [200.01, 500.00]);
        } elseif ($this->price == 3) {
            $querito->whereBetween('precio', [500.01, 1000.00]);
        } elseif ($this->price == 4) {
            $querito->where('precio', '>=', 1000.01);
        }

        if ($this->stock == 'agotado') {
            $querito->where('cantidad_producto', '=', 0);
        } elseif ($this->stock == 'bajo') {
            $querito->whereBetween('cantidad_producto', [1, 10]);
        } elseif ($this->stock == 'medio') {
            $querito->whereBetween('cantidad_producto', [11, 50]);
        } elseif ($this->stock == 'alto') {
            $querito->where('cantidad_producto', '>=', 51);
        }

        $querito->where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search .  '%')
                ->orWhere('descripcion', 'like', '%' . $this->search .  '%');
        });

        $productos = $querito->paginate(10);

        $categorias = Categoria::all();

        return view('livewire.productos-component', compact('productos', 'categorias'));
    }

    public function resetFilters(){
        $this->search = '';    
        $this->order = ''; 
        $this->category = '';
        $this->price = '';
        $this->stock = '';
    }
}
