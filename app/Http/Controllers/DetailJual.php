<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Petugas;
use App\Models\theadjual;
use App\Models\tdetailjual;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function Laravel\Prompts\alert;

class DetailJual extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = tdetailjual::with('barang')->where('notrans', '=', session('notrans'))->get();
        
        $barangKeranjang = $detail->map(function ($barang) {
            return $barang->id_barang;
        })->all();
        $barangs = Barang::orderBy('nama_barang')->get();
        $petugas = User::where('id', '=', auth()->user()->id)->get();
        $notrans = theadjual::where('notrans', '=', session('notrans'))->get();
        $pesan= Barang::where('stok','<=','15')->count();
        $barang= Barang::where('stok','<=','15')->get();
        
        // dd($petugas);
        return view('petugas.transaksi.DetailPenjualan', compact('barangs', 'petugas', 'detail', 'notrans','pesan','barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dataB(string $id, string $id2, string $id3)
    {

        $notrans = session('notrans');
        $detail = new tdetailjual();
        // if ($notrans == session('notrans') && $detail->id_barang == $id ) {
        //     // $detail->notrans = $notrans;
        //     // $detail->id_barang = $id;
        //     // $detail->harga_awal = $id3;
        //     // $detail->harga_jual = $id2;
        //     // $detail->qty  = 1;
        //     // $detail->subtotal = $id2;
        //     // dd($detail);
        //     return back()->with('danger','dp');
        // }
        $detail->notrans = $notrans;
        $detail->id_barang = $id;
        $detail->harga_awal = $id3;
        $detail->harga_jual = $id2;

        $keranjang = tdetailjual::where('notrans', '=', $notrans)->where('id_barang', '=', $id)->first();
        if ($keranjang) {
            $keranjang->update([
                'qty' => $keranjang->qty + 1,
            ]);
        } else {
            $detail->qty  = 1;
            $detail->subtotal = $id2;
            $detail->save();
        }


        return redirect('/penjualan-detail');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
