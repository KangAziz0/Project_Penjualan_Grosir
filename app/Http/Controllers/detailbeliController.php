<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Suplier;
use App\Models\tdetailbeli;
use App\Models\theadbeli;
use Illuminate\Http\Request;

class detailbeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = session('id');
        $barangs = Barang::orderBy('nama_barang')->get();
        $suplier = Suplier::where('id', '=', session('id_suplier'))->get();
        $detail = tdetailbeli::with('barang')->where('notrans', '=', session('notrans'))->get();
        $pesan = Barang::where('stok','<=','15')->count();
        $barang = Barang::where('stok','<=','15')->get();
        return view('petugas.transaksi.pembeliandetail', compact('pembelian', 'barangs', 'suplier', 'detail','pesan','barang'));

        // echo "berhasil";
    }

    public function dataB(Request $request)
    {
        $notrans = session('notrans');
        $detailbeli = new tdetailbeli();
        $detailbeli->notrans = $notrans;
        $detailbeli->id_barang = $request->id_barang;
        $detailbeli->harga_beli = $request->harga_awal;
        $detailbeli->qty  = 1;
        $detailbeli->subtotal = $request->harga_awal;

        if ($request->harga_jual < $request->harga_awal ) {
            return back()->with('failed','Harga Jual Kurang');
        }
        
        $detailjual = Barang::where('id_barang','=',$request->id_barang)->update([
            'harga_jual' => $request->harga_jual,
            'harga_awal' => $request->harga_awal
        ]);
        $detailbeli->save();
        return redirect('/pembelian-detail');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembelian = theadbeli::where('notrans', '=', session('notrans'))->first()->update($request->all());
        $detail = tdetailbeli::where('notrans', '=', session('notrans'))->get();
        foreach ($detail as $item) {
            $produk = Barang::find($item->id_barang);
            $produk->harga_awal = $item->harga_beli;
            $produk->stok += $item->qty;
            $produk->update();
            $item->subtotal = $item->harga_beli * $item->qty;
            $item->update();
        }
        return redirect('pembelian')->with('success', 'Transaksi Berhasil');
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
        // $detail = tdetailbeli::find($id);
        // $detail->qty = $request->qty;
        // $detail->subtotal = $detail->harga_beli * $request->qty;
        // $detail->update();
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = tdetailbeli::where('notrans', session('notrans'))->where('id_barang', $id);
        $data->delete();
        return redirect('/pembelian-detail');
    }
}
