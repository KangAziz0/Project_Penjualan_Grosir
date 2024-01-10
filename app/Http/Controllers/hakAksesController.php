<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class hakAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = User::with('Petugas')->get();
        $data['hak'] = User::with('Petugas')->join('tpetugas','tpetugas.id','users.kode_petugas')->get();
        // $data['petugas']= Petugas::where('kode_petugas','!=',$hak->kode_petugas)->get();
        $data['petugas']= Petugas::all();
        // dd($data['petugas']);
        // dd($data['petugas']);
        return view('admin.hakAkses.hak', $data);
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


        // $Users = User::select('kode_petugas')->where('kode_petugas','=',$request->kode_petugas)->get();
        // if ($Users::select('*') == $request->kode_petugas) {
        //     dd('berhasil');
        // }
        $Users = new User();
        $Users->kode_petugas = $request->kode_petugas;
        $Users->name = $request->nama;
        $Users->email = $request->email;
        $Users->password = bcrypt($request->password);
        $Users->role = $request->role;
        $Users->save();

        return redirect('/hakakses')->with('success', 'Berhasil Menambah User');
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
