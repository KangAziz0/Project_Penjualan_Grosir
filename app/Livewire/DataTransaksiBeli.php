<?php

namespace App\Livewire;

use App\Models\Suplier;
use App\Models\theadbeli;
use Livewire\Component;
use Livewire\WithPagination;

class DataTransaksiBeli extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.data-transaksi-beli',[
            'thead'=> theadbeli::with('suplier')->join('tsuplier','tsuplier.id','theadbeli.id_suplier')->where('nama_suplier','like','%'.$this->search.'%')->paginate(10)
        ]);
    }
      public function updateSearch()
    {
        $this->resetPage();
    }
}
