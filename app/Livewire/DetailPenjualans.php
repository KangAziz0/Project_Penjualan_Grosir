<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Petugas;
use Livewire\Component;
use App\Models\theadjual;
use App\Models\tdetailjual;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class DetailPenjualans extends Component
{
    public $cart, $totalPrice = 0, $subtotal = 0;

    public function decrementQuantity(int $cardId, Request $request)
    {
        $cardData = tdetailjual::where('id_barang', $cardId)->where('notrans', session('notrans'));
        if ($cardData) {
            $cardData->decrement('qty');
        }
    }
    public function incrementQuantity(int $cardId, Request $request)
    {
        $cardData = tdetailjual::where('id_barang', $cardId)->where('notrans', session('notrans'));
        if ($cardData) {
            $cardData->increment('qty');
        }
    }
    public function render()
    {
        $data['barangs'] = Barang::orderBy('nama_barang')->get();
        $data['petugas'] = User::where('id', '=', auth()->user()->id)->get();
        $data['notrans'] = theadjual::where('notrans', '=', session('notrans'))->get();
        $data['detail'] = tdetailjual::with('barang')->where('notrans', '=', session('notrans'))->get();
        return view('livewire.detail-penjualans', $data);
    }
}
