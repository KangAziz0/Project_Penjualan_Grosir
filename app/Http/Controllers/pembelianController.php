<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Suplier;
use App\Models\theadbeli;
use App\Models\theadjual;
use App\Models\tdetailbeli;
use App\Models\tdetailjual;
use Illuminate\Http\Request;

class pembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suplier = Suplier::orderBy('nama_suplier')->get();
        $thead = theadbeli::with('suplier')->get();
        $pesan = Barang::where('stok','<=','15')->count();
        $barang = Barang::where('stok','<=','15')->get();
        return view('petugas.transaksi.pembelian', compact('suplier', 'thead','pesan','barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, Request $request)
    {
        $pembelian = theadbeli::latest()->first();
        if ($pembelian == null) {
            $pembelian = new theadbeli();
            $pembelian->notrans = 'TRS' . ' >> ' . Carbon::now()->toDateString() . ' >> ' . 'T-000001';
            $pembelian->tanggal = date(now());
            $pembelian->id_suplier = $id;
            $pembelian->totalitem = 0;
            $pembelian->totalharga = 0;
            $pembelian->totalbayar = 0;
            session(['id' => $pembelian->id]);
            session(['notrans' => $pembelian->notrans]);
            session(['id_suplier' => $pembelian->id_suplier]);
            $pembelian->save();
            // dd($pembelian);
            return redirect('/pembelian-detail')->with('success', 'Data Berhasil Di Tambahkan');
        }
        $request['notrans'] = 'T-' . tambah_nol_depan($pembelian->id + 1, 6);
        $pembelian  =  new theadbeli();
        $pembelian->notrans = 'TRS' . ' >> ' . Carbon::now()->toDateString() . ' >> ' . $request->notrans;
        $pembelian->id_suplier = $id;
        $pembelian->tanggal = date(now());
        $pembelian->totalitem = 0;
        $pembelian->totalharga = 0;
        $pembelian->totalbayar = 0;
        session(['id' => $pembelian->id]);
        session(['notrans' => $pembelian->notrans]);
        session(['id_suplier' => $pembelian->id_suplier]);
        $pembelian->save();
        return redirect('/pembelian-detail')->with('success', 'Data Berhasil Di Tambahkan');
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
    public function lihatDetail(string $id, $id1)
    {
        $data['thead'] = theadbeli::where('notrans', '=', $id)->get();
        $data['tdetail'] = tdetailbeli::with('barang')->where('notrans', $id)->get();
        $data['suplier'] = Suplier::where('id', $id1)->get();
        $data['pesan'] = Barang::where('stok','<=','15')->count();
        $data['barang'] = Barang::where('stok','<=','15')->get();
        return view('petugas.transaksi.detail-pembelian', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Laporan()
    {
        $tanggal = 0;
        $filter = theadbeli::with('tdetail','suplier')->where('tanggal', '=', $tanggal)->get();
        $detail = theadbeli::with(['tdetail','suplier'])->where('tanggal', '=', $tanggal)->where('tanggal', '=', $tanggal)->join('tdetailbeli', 'tdetailbeli.notrans', '=', 'theadbeli.notrans')->get();
        $total = 0;
        $pesan = Barang::where('stok','<=','15')->count();
        $barang = Barang::where('stok','<=','15')->get();
        return view('Laporan.laporanPb', compact('filter', 'total', 'detail','pesan','barang'));
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
    public function periode(Request $request)
    {
        $tanggalAwal = $request->tanggalAwal;
        $tanggalAkhir = $request->tanggalAkhir;
        $filter = theadbeli::with('tdetail')->where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->join('tdetailbeli', 'tdetailbeli.notrans', '=', 'theadbeli.notrans')->get();
        $detail = theadbeli::with('tdetail','suplier')->where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->join('tdetailbeli', 'tdetailbeli.notrans', '=', 'theadbeli.notrans')->join('tbarang','tbarang.id_barang','=','tdetailbeli.id_barang')->get();
        // dd($detail);
        $total = theadbeli::where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->sum('totalbayar');
        $pesan = Barang::where('stok','<=','15')->count();
        $barang = Barang::where('stok','<=','15')->get();
        return view('Laporan.laporanPb', compact('filter', 'total', 'detail','pesan','barang'));
    }
    public function cetak(Request $request){
        $tanggalAwal = $request->tanggalAwal;
        $tanggalAkhir = $request->tanggalAkhir;
        $detail = theadbeli::with('tdetail','suplier')->where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->join('tdetailbeli', 'tdetailbeli.notrans', '=', 'theadbeli.notrans')->join('tbarang','tbarang.id_barang','=','tdetailbeli.id_barang')->get();
        $total = theadbeli::where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->sum('totalbayar');
        $pdf = PDF::loadview('laporanB_pdf',['detail' => $detail,'total' => $total,'tanggalAwal'=>$tanggalAwal,'tanggalAkhir' =>$tanggalAkhir]);
        return $pdf->stream('laporan-pembelian.pdf');
     
    }
}
