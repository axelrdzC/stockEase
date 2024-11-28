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
        $querito = Almacen::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%');
        });

        $queritoString = $this -> search;

        $almacenes = $querito->paginate(10);

        $almacenes =  $querito->get();

        return view('livewire.almacenes-component', compact('almacenes', 'queritoString'));
    }

    public function resetFilters(){    
        $this->search = '';
        $this->order = '';
        $this->capacidad = '';
        $this->pais = '';
    }
}
