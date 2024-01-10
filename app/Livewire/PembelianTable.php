<?php

namespace App\Livewire;

use App\Models\Suplier;
use Livewire\Component;
use Livewire\WithPagination;

class PembelianTable extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.pembelian-table', [
            'suplier' => Suplier::where('nama_suplier', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
    public function updateSearch()
    {
        $this->resetPage();
    }
}
