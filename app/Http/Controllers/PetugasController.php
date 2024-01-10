<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['petugas'] = Petugas::all();
        $data['users'] = User::with('petugas')->get();
        $data['pesan'] = Barang::where('stok','<=','15')->count();
        $data['barang'] = Barang::where('stok','<=','15')->get();
        return view('admin.master.petugas',$data);
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
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'agama' => 'required',
            'notlp' => 'required',
        ], [
            'nama' => 'Kolom Nama Wajib Di Isi',
            'jk' => 'Kolom JenisKelamin Wajib Di Isi',
            'alamat' => 'Kolom alamat Wajib Di Isi',
            'jabatan' => 'Kolom jabatan Wajib Di Isi',
            'agama' => 'Kolom agama Wajib Di Isi',
            'notlp' => 'Kolom notlp Wajib Di Isi',
            
        ]);
        if ($validator->fails()) {
            return redirect('/petugas')->withErrors($validator)->withInput()->with('tambahModal', true);
        }
        $petugas = User::latest()->first();
        if ($petugas == null) {
            $petugas = new User();
            $petugas->kode_petugas = 'PTG-000001';
            $petugas->nama_petugas = $request->nama;
            $petugas->jenis_kelamin = $request->jk;
            $petugas->alamat = $request->alamat;
            $petugas->role = $request->jabatan;
            $petugas->agama = $request->agama;
            $petugas->no_telepon = $request->notlp;
            $petugas->password = bcrypt($request->password);
            $petugas->save();
            return redirect('/petugas')->with('success','Data Berhasil Di Tambahkan');
        }
        $request['kode'] = 'PTG-' . tambah_nol_depan($petugas->id + 1, 6);
        $petugas = new User();
        $petugas->kode_petugas = $request->kode;
        $petugas->nama_petugas = $request->nama;
        $petugas->jenis_kelamin = $request->jk;
        $petugas->alamat = $request->alamat;
        $petugas->role = $request->jabatan;
        $petugas->agama = $request->agama;
        $petugas->no_telepon = $request->notlp;
        $petugas->password = bcrypt($request->password);
        $petugas->save();
        
        return redirect('/petugas')->with('success','Data Berhasil Di Tambahkan');
        // dd($petugas);
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
        $data = User::findOrFail($id);
        $data->kode_petugas = $request->kode;
        $data->nama_petugas = $request->nama;
        $data->jenis_kelamin = $request->jk;
        $data->Alamat = $request->alamat;
        $data->role = $request->jabatan;
        $data->agama = $request->agama;
        $data->no_telepon = $request->notlp;
        $data->save();
        return redirect('/petugas')->with('info','Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::where('kode_petugas',$id);
        // if ($data == 1) {
            
        // }
        $data->delete();
        return redirect('/petugas')->with('danger','Data Berhasil Di Hapus');
    }
}
