<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proveedor;
use App\Models\Categoria;

class ProveedoresComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $order = '';

    public function render()
    {
        $querito = Proveedor::query();

        if ($this->category) {
            $querito->where('id_categoria', '=', $this->category);
        }

        if ($this->order == 'asc') {
            $querito->orderBy('nombre', 'asc');
        } elseif ($this->order == 'desc') {
            $querito->orderBy('nombre', 'desc');
        }

        $querito->where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search .  '%')
                ->orWhere('telefono', 'like', '%' . $this->search .  '%')
                ->orWhere('direccion', 'like', '%' . $this->search .  '%')
                ->orWhere('email', 'like', '%' . $this->search .  '%');
        });

        $proveedores = $querito->paginate(10);

        $categorias = Categoria::all();

        return view('livewire.proveedores-component', compact('proveedores', 'categorias'));
    }

    public function resetFilters(){
        $this->search = '';
        $this->order = ''; 
        $this->category = '';
    }
}
