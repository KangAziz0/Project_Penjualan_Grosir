<?php

namespace App\Livewire;

use App\Models\kategori;
use Livewire\Component;
use Livewire\WithPagination;

class KategoriTable extends Component
{
    public $search ='';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.kategori-table',[
            'kategori'=>kategori::where('nama_kategori','like','%'.$this->search.'%')->paginate(10)
        ]);
    }
}
