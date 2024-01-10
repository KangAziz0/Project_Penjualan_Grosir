<?php

namespace App\Livewire;

use App\Models\Petugas;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PetugasTable extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.petugas-table',[
            'users'=>User::where('nama_petugas','like','%'.$this->search.'%')->paginate(10),
        ]);
    }
    public function updateSearch(){
        $this->resetPage();
    }
}
