<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Petugas;
use App\Models\theadjual;
use App\Models\tdetailjual;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use function Laravel\Prompts\alert;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['theadjual'] = theadjual::with('petugas')->where('tanggal','=','')->get();
        // dd(date(now()));
        $data['pesan'] = Barang::where('stok','<=','15')->count();
        $data['barang'] = Barang::where('stok','<=','15')->get();
        return view('petugas.transaksi.penjualan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $penjualan = theadjual::latest()->first();
        if ($penjualan == null) {
            $penjualan = new theadjual();
            $penjualan->notrans = 'PJL' . ' >> ' . Carbon::now()->toDateString() . ' >> ' . 'P-000001';
            $penjualan->kode_petugas = auth()->user()->id;
            $penjualan->tanggal = Carbon::now()->toDateString();
            $penjualan->totalbayar = 0;
            $penjualan->bayar = 0;
            $penjualan->kembalian = 0;
            $penjualan->save();
            session(['notrans' => $penjualan->notrans]);
            return redirect('/penjualan-detail')->with('success', 'Berhasil');
        }
        $request['notrans'] = 'P-' . tambah_nol_depan($penjualan->id + 1, 6);
        $penjualan = new theadjual();
        $penjualan->notrans = 'PJL' . ' >> ' . Carbon::now()->toDateString() . ' >> ' . $request->notrans;
        $penjualan->kode_petugas = auth()->user()->id;
        $penjualan->tanggal = Carbon::now()->toDateString();
        $penjualan->totalbayar = 0;
        $penjualan->bayar = 0;
        $penjualan->kembalian = 0;
        $penjualan->save();
        session(['notrans' => $penjualan->notrans]);
        return redirect('/penjualan-detail')->with('success', 'Berhasil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembelian = theadjual::where('notrans', '=', session('notrans'))->first();
        $pembelian->totalbayar = $request->totalharga;
        $pembelian->bayar = $request->totalbayar;
        $pembelian->kembalian = $request->kembalian;
        // dd($pembelian);;
        if ($pembelian->kembalian < 0) {
            return back()->with('failed', 'Pembayaran Tidak Boleh Kurang Dari Total');
        }
        $pembelian->update();
        $detail = tdetailjual::where('notrans', '=', session('notrans'))->get();
        foreach ($detail as $item) {
            $produk = Barang::find($item->id_barang);
            $produk->stok -= $item->qty;
            $produk->update();
            $item->subtotal = $item->harga_jual * $item->qty;
            $item->update();
        }

        return redirect('penjualan')->with('AlertSuccess', 'Transaksi Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function struk()
    {
        $data['theadjual'] = theadjual::with('petugas')->where('notrans', '=', session('notrans'))->first();
        $data['detail'] = tdetailjual::with('barang')->where('notrans', '=', session('notrans'))->get();
        return view('petugas.Struk.strukPenjualan', $data);
        // dd($data);
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
        $data = tdetailjual::where('notrans', session('notrans'))->where('id_barang', $id);
        $data->delete();
        return redirect('/penjualan-detail');
    }
    public function Laporan()
    {
        $tanggal = 0;
        $filter = theadjual::with('tdetailjual')->where('tanggal', '=', $tanggal)->get();
        // $detail = tdetailjual::where('tanggal','=',$tanggal);
        $detail = tdetailjual::where('tanggal', '=', $tanggal)->where('tanggal', '=', $tanggal)->join('theadjual', 'theadjual.notrans', '=', 'tdetailjual.notrans')->get();
        $pesan = Barang::where('stok','<=','15')->count();
        $barang = Barang::where('stok','<=','15')->get();
        $total = 0;
        return view('Laporan.laporanPj', compact('filter', 'total', 'detail','pesan','barang'));
    }

    // public function LaporanPenjualan(Request $request)
    // {
    //     $theadjual = theadjual::where('tanggal', '=', $request->tanggalAwal);
    //     dd($theadjual);
    // }

    public function LaporanPendapatan()
    {
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');
        // dd($tanggalAwal);
        return view('Laporan.laporanPd', compact('tanggalAwal', 'tanggalAkhir'));
    }
    public function refresh(Request $request)
    {
        $theadjual = theadjual::all()->where('tanggal', '=', $request->tanggalAwal);
        // $tdetailJual = tdetailjual::all();
        dd($theadjual);
    }
    public function filter(Request $request)
    {
        $tanggalAwal = $request->tanggalAwal;
        $tanggalAkhir = $request->tanggalAkhir;
        $filter = theadjual::with('tdetailjual')->where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->join('tdetailjual', 'tdetailjual.notrans', '=', 'theadjual.notrans')->get();
        $detail = tdetailjual::where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->join('theadjual', 'theadjual.notrans', '=', 'tdetailjual.notrans')->get();
        $total = theadjual::where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->sum('totalbayar');
        $pesan = Barang::where('stok','<=','15')->count();
        $barang = Barang::where('stok','<=','15')->get();
        return view('Laporan.laporanPj', compact('filter', 'total', 'detail','pesan','barang'));
    }
    public function cetakPDF(Request $request)
    {
        $tanggalAwal = $request->tanggalAwal;
        $tanggalAkhir = $request->tanggalAkhir;
        $detail = tdetailjual::where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->join('theadjual', 'theadjual.notrans', '=', 'tdetailjual.notrans')->get();
        $total = theadjual::where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->sum('totalbayar');
        $pdf = PDF::loadview('laporan_pdf',['detail' => $detail,'total' => $total,'tanggalAwal'=>$tanggalAwal,'tanggalAkhir' =>$tanggalAkhir]);
        return $pdf->stream('laporan-penjualan.pdf');
    }
}
