<?php

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

class PenjualanBarang extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.penjualan-barang', [
            'barang' => Barang::where('nama_barang', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
    public function updateSearch()
    {
        $this->resetPage();
    }
}
