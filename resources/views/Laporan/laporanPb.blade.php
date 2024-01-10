@extends('index')
@section('title','Laporan Pembelian')
@section('content')
<div class="d-flex" style="width: 100%;gap: 5px;">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-calendar-days"></i> Lihat Periode
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cetak">
        <i class="fa-solid fa-file-pdf"></i> Cetak Laporan
    </button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Periode Pembelian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/periode" method="get">
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
                <h5 class="modal-title" id="exampleModalLabel">Periode Pembelian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/cetak" method="post">
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
<table class="table table-striped table-bordered mt-3">
    <thead class="table-primary">
        <tr>
            <th>Nama Suplier</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detail as $datas)
        
        <tr>
            <td class="text-primary">{{$datas->suplier->nama_suplier}}</td>
            <td>{{$datas->tanggal}}</td>
            <td>{{$datas->nama_barang}}</td>
            <td>{{$datas->harga_beli}}</td>
            <td>{{$datas->qty}}</td>
            <td>{{$datas->subtotal}}</td>
            <td>{{$datas->totalbayar}}</td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection