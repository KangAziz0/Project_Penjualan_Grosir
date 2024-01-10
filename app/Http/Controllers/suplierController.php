<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Suplier;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Constraint\Constraint;

class suplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suplier['suplier'] = Suplier::Paginate(10)->fragment('spl');
        $suplier['pesan'] = Barang::where('stok','<=','15')->count();
        $suplier['barang'] = Barang::where('stok','<=','15')->get();
        return view('admin.master.suplier', $suplier);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            // 'kode' => 'required',
            'alamat' => 'required',
            'notlp' => 'required'
        ], [
            'nama' => 'Kolom Nama Harus DiIsi',
            // 'kode' => 'Kolom Kode Harus DiIsi',
            'alamat' => 'Kolom alamat Harus DiIsi',
            'notlp' => 'Notlp Harus DiIsi'
        ]);
        if ($validator->fails()) {
            return redirect()->route('suplier.index')->withErrors($validator)->withInput()->with('tambahModal', true);
        }

        $anggota = Suplier::latest()->first();
        if ($anggota == null) {
            $anggota = new Suplier();
            $anggota->kode_suplier = 'SPL-000001';
            $anggota->nama_suplier = $request->nama;
            $anggota->alamat = $request->alamat;
            $anggota->no_telepon = $request->notlp;
            $anggota->save();
            return redirect()->route('suplier.index')->with('success', 'Data Berhasil Di Tambahkan');
        }
        $request['kode'] = 'SPL-' . tambah_nol_depan($anggota->id + 1, 6);
        $anggota = new Suplier();
        $anggota->kode_suplier = $request->kode;
        $anggota->nama_suplier = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->no_telepon = $request->notlp;
        $anggota->save();

        return redirect()->route('suplier.index')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, string $id)
    {
        $data = Suplier::findOrFail($id);
        $data->id = $id;
        $data->nama_suplier = $request->nama;
        $data->alamat = $request->alamat;
        $data->no_telepon = $request->notlp;
        $data->save();
        return redirect()->route('suplier.index')->with('info', 'Data Berhasil Di Ubah');
        //    dd($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Suplier::where('kode_suplier', $id);
        $data->delete();
        return redirect()->route('suplier.index')->with('danger', 'Data Berhasil Di Hapus');
    }

}
