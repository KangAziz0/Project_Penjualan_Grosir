@extends('index')
@section('title','Laporan Penjualan')
@section('content')
<!-- Button trigger modal -->
@php $laba = 0; @endphp
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Periode Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/filter" method="get">
                    @csrf
                    <tr>
                        <label class="form-label text-success">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tanggalAwal" required>
                    </tr>
                    <tr>
                        <label class="form-label text-success">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggalAkhir" required>
                    </tr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Lihat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cetak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Periode Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/cetakPDF" method="get">
                    @csrf
                    <tr>
                        <label class="form-label text-success">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tanggalAwal" required>
                    </tr>
                    <tr>
                        <label class="form-label text-success">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggalAkhir" required>
                    </tr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Lihat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="d-flex" style="width: 100%;gap: 5px;">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-calendar-days"></i> Lihat Periode
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cetak">
        <i class="fa-solid fa-file-pdf"></i> Cetak Laporan
    </button>
</div>
<table class="table table-striped table-bordered mt-3">
    <thead class="table-primary">
        <tr>
            <th>No Trans</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>qty</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Kembalian</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detail as $datas)
        @php
        $laba += ($datas->harga_jual * $datas->qty) - ($datas->harga_awal * $datas->qty);
        @endphp
        <tr>
            <td class="text-primary">{{$datas->notrans}}</td>
            <td>{{$datas->tanggal}}</td>
            <td>{{$datas->barang[0]->nama_barang}}</td>
            <td>{{$datas->harga_jual}}</td>
            <td>{{$datas->qty}}</td>
            <td>{{$datas->subtotal}}</td>
            <td>{{$datas->totalbayar}}</td>
            <td>{{$datas->bayar}}</td>
            <td>{{$datas->kembalian}}</td>
        </tr>

        @endforeach
    </tbody>
</table>
<div class="col-lg-12 d-flex justify-content-space-between">
    <label style="width: 30%;height: 45px;font-size: 40px;font-weight: 600;display: flex;align-items: center;justify-content: center;">Omset</label>
    <label class="bg-primary text-white" style="width: 70%;height: 45px;font-size: 40px;font-weight: 600;display: flex;align-items: center;justify-content: center;">{{'Rp. ' .format_uang($total)}}</label>
</div>
<div class="col-lg-12 d-flex justify-content-space-between mt-2">
    <label style="width: 30%;height: 45px;font-size: 40px;font-weight: 600;display: flex;align-items: center;justify-content: center;">Laba</label>
    <label class="bg-primary text-white" style="width: 70%;height: 45px;font-size: 40px;font-weight: 600;display: flex;align-items: center;justify-content: center;">{{'Rp. '.format_uang($laba)}}</label>
</div>


@endsection