<?php

namespace App\Http\Controllers;

use App\Charts\PendapatanBulananChart;
use App\Models\Barang;
use App\Models\Petugas;
use App\Models\theadbeli;
use App\Models\theadjual;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index(PendapatanBulananChart $chart){
        $charts = $chart->build();
        $penjualan = theadjual::all()->count();
        $pembelian = theadbeli::all()->count();
        $pendapatan = theadjual::sum('totalbayar');
        $petugas = User::all()->count();
        $pesan = Barang::where('stok','<=','15')->count();
        $barang = Barang::where('stok','<=','15')->get();
        return view('Dashboard.dashboard',compact('penjualan','pembelian','pendapatan','petugas','charts','pesan','barang'));
    }
}
