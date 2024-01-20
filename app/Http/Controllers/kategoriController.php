<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] = kategori::all();
        $data['pesan'] = Barang::where('stok', '<=', '15')->count();
        $data['barang'] = Barang::where('stok', '<=', '15')->get();
        return view('admin.master.kategori', $data);
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
        $kategori = new kategori();
        $kategori->nama_kategori = $request->nama;
        $kategori->save();

        return redirect('/kategori')->with('success', 'Data Berhasil Di Tambahkan');
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
        $data = DB::table('kategori')->where('id_kategori', '=', $id)->update([
            'nama_kategori' => $request->kategori
        ]);
        return redirect('/kategori')->with('info', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = kategori::where('id_kategori', $id);
        $data->delete();
        return redirect('/kategori')->with('danger', 'Data Berhasil Di Hapus');
    }
}
