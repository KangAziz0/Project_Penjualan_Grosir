<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\kategori;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barang'] = Barang::with('kategori')->get();
        $data['kategori'] = kategori::select('id_kategori', 'nama_kategori')->get();
        $data['pesan'] = Barang::where('stok','<=','15')->count();
        $data['barang'] = Barang::where('stok','<=','15')->get();
        return view('admin.master.barang', $data);
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
        $validator = Validator::make($request->all(), [
            'id_barang' => 'required',
            'nama' => 'required',
            'id_kategori' => 'required',
            'harga_awal' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ], [
            'id_barang' => 'Kolom id_barang Wajib Di Isi',
            'nama' => 'Kolom Barang Wajib Di Isi',
            'id_kategori' => 'Kolom Kategori Wajib Di Isi',
            'harga_awal' => 'Kolom Harga_Awal Wajib Di Isi',
            'harga_jual' => 'Kolom Harga_Jual Wajib Di Isi',
            'stok' => 'Kolom Stok Wajib Di Isi',
        ]);
        if ($validator->fails()) {
            return redirect()->route('barang.index')->withErrors($validator)->withInput()->with('tambahModal', true);
        }
        $barang = new Barang();
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama;
        $barang->id_kategori = $request->id_kategori;
        $barang->harga_awal = $request->harga_awal;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok = $request->stok;
        $barang->save();
        Activity('Tambah')->withProperties(['Data Barang' => $request->nama])->log('Menambah Data Barang');

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Di Tambahkan');
        // dd($barang);
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
        $data = Barang::findOrFail($id);
        $data->id_barang = $id;
        $data->nama_barang = $request->nama;
        $data->id_kategori = $request->id_kategori;
        $data->harga_awal = $request->harga_awal;
        $data->harga_jual = $request->harga_jual;
        $data->stok = $request->stok;

        // dd($data);
        $data->save();
        Activity('Update')->withProperties(['update Barang' => $request->nama])->log('Update Data Barang');
        return redirect()->route('barang.index')->with('info', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Barang::where('id_barang', $id);
        $data->delete();
        Activity('Delete')->withProperties(['delete Barang' => $id])->log('Delete Barang');
        return redirect()->route('barang.index')->with('danger', 'Data Berhasil Di Hapus');
    }
}
