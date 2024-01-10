<?php

namespace App\Charts;

use App\Models\theadbeli;
use App\Models\theadjual;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PendapatanBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $tahun = date('Y');
        $bulan = date('m');

        for($i = 1; $i <= $bulan ;$i++){
            $totalPenjualan = theadjual::whereYear('tanggal',$tahun)->whereMonth('tanggal',$i)->sum('totalbayar');
            $totalPembelian = theadbeli::whereYear('tanggal',$tahun)->whereMonth('tanggal',$i)->sum('totalbayar');
            $pendapatan = theadjual::whereYear('tanggal',$tahun)->whereMonth('tanggal',$i)->sum('totalbayar');
            $dataBulan[]=$i;
            $dataTotal[]= $totalPenjualan;
            $pembelianTotal[]= $totalPembelian;
            $totalPendapatan[]=$pendapatan;
            // dd($totalPenjualan);
        
        }
        // dd($dataTotal);
        
        return $this->chart->barChart()
        // return $this->chart->areaChart()
        ->setTitle('Grafik Total Penjualan & Pembelian Barang Perbulan')
        ->setSubtitle('Statistik Untuk Tahun '.$tahun)
        ->addData('Penjualan',$dataTotal)
        ->addData('Pembelian',$pembelianTotal)
        ->setHeight(425)
        ->setGrid()
        ->setFontFamily('Poppins')
        ->setXAxis(['Januari','Februari','Maret','April','Mei','Juni']);

        // ->setFontColor('#000000');


        // ->setTitle('Sales during 2021.')
        // ->setSubtitle('Physical sales vs Digital sales.')
        // ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
        // ->addData('Digital sales', [70, 29, 77, 28, 55, 45]);
        // ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);


    }
}
