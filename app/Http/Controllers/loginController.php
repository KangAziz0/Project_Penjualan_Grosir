<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
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
        Session::flash('name', $request->user);
        $data = [
            'nama_petugas' => $request->user,
            'password' => $request->password
        ];

        // dd($data);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            activity('login')->causedBy(Auth::user())
            ->log(Auth::user()->name.' Melakukan Login');
            return redirect()->intended('/')->with('switsuccess','Selamat Datang '.$request->user);
        }else{
        // dd($data);
        return redirect()->route('login')->with('failed', 'Username Atau Password Anda Salah');
       
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
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
