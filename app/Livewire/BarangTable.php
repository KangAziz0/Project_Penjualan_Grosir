<?php

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use App\Models\kategori;
use Livewire\WithPagination;

class BarangTable extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.barang-table',[
            'barang'=>Barang::where('nama_barang','like','%'.$this->search.'%')->paginate(10),
            'kategori'=> kategori::select('id_kategori', 'nama_kategori')->get()
        ]);
    }
    public function updateSearch(){
        $this->resetPage();
    }
}
