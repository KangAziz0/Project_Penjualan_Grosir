<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Suplier;
use Livewire\Component;
use App\Models\theadbeli;
use App\Models\tdetailbeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;
use App\Http\Controllers\detailbeliController;

class Detailbeli extends Component
{
    public $cart,$totalPrice = 0,$totalItem = 0,$subtotal = 0;

    public function decrementQuantity(int $cardId,Request $request)
    {
        $cardData = tdetailbeli::where('id_barang', $cardId)->where('notrans', session('notrans'));
        if ($cardData) {
            $cardData->decrement('qty');
            // $cardData['subtotal'] = $cardData->harga_beli * $cardData->qty;
        } else {
            alert('gagal');
        }
    }
    public function incrementQuantity(int $cardId,Request $request)
    {
        $cardData = tdetailbeli::where('id_barang', $cardId)->where('notrans', session('notrans'));
        if ($cardData) {
            $cardData-> increment('qty');
            // $cardData->subtotal = DB::update('UPDATE `tdetailbeli` SET subtotal = \'$cardData->harga_beli  * $cardData->qty\' WHERE id_barang = \'$cardId\'');
            // $cardData->subtotal = $cardData * $cardData->increment('qty');    
          
        } else {
           
            alert('gagal');
        }
    }

    public function render()
    {
        $pembelian = session('id');
        $barangs = Barang::orderBy('nama_barang')->get();
        $suplier = Suplier::where('id', '=', session('id_suplier'))->get();
        $notrans = theadbeli::where('notrans','=',session('notrans'))->get();
        $detail = tdetailbeli::with('barang')->where('notrans', '=', session('notrans'))->get();

        return view('livewire.detailbeli', compact('pembelian', 'suplier','barangs', 'detail','notrans'));
    }
}
