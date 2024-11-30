<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Almacen;

class AlmacenesComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $order = '';
    public $capacidad = '';
    public $pais = '';

    public function render()
    {
        $querito = Almacen::query();

        if ($this->pais) {
            $querito->where('pais', '=', $this->pais);
        }

        if ($this->capacidad == 'bajo') {
            $querito->where('capacidad', '=', $this->capacidad);
        }

        if ($this->order) {
            $querito->orderBy('nombre', $this->order);
        }


        $querito->where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search .  '%')
            ->orWhere('estado', 'like', '%' . $this->search .  '%')
            ->orWhere('ciudad', 'like', '%' . $this->search .  '%')
            ->orWhere('codigo_p', 'like', '%' . $this->search .  '%');
        });

        $almacenes = $querito->paginate(10);

        return view('livewire.almacenes-component', compact('almacenes'));
    }

    public function resetFilters(){
        $this->search = '';
        $this->order = '';
        $this->capacidad = '';
        $this->pais = '';
    }
}
