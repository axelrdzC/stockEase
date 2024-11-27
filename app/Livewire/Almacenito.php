<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Almacen;

class Almacenito extends Component
{
    use WithPagination;

    public string $search = ''; 
    public $order = null;  
    public $capacidad = null; 
    public $pais = null; 

    public function render()
    {
        $query = Almacen::query();

        if ($this->search) {
            $query->where('nombre', 'like', '%' . $this->search . '%');
        }

        if ($this->order == '1') {
            $query->orderBy('nombre', 'asc');
        } elseif ($this->order == '2') {
            $query->orderBy('nombre', 'desc');
        }

        if ($this->capacidad) {
            $query->where('capacidad', $this->capacidad);
        }

        if ($this->pais) {
            $query->where('pais', $this->pais);
        }

        //dd($this->pais, $query->toSql(), $query->getBindings());

        $almacenes = $query->get();

        return view('livewire.almacenito', compact('almacenes'));
    }

    public function resetFilters(){    
        $this->search = '';
        $this->order = null;
        $this->capacidad = null;
        $this->pais = null;
    }
}
