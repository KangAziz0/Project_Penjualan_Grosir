@extends('index')
@section('title','Transaksi Penjualan')
@section('content')

<div>

    <div class="d-flex " style="justify-content: space-between;">
        <a href="{{route('create.jual')}}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Tambah Data
        </a>
    </div>
    <h3 class="d-flex justify-content-center text-success">Daftar Penjualan</h3>


    <table class="table table-light table-bordered mt-2">

        <thead class="table-success">
            <tr>
                <th>No Trans</th>
                <th>Nama Petugas</th>
                <th>Tanggal</th>
                <th>Total Bayar</th>
                <th>Bayar</th>
                <th>Kembalian</th>
                <th class="d-flex justify-content-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($theadjual as $head)
            <tr>
                <td>{{$head->notrans}}</td>
                <td>{{$head->petugas->nama_petugas}}</td>
                <td>{{$head->tanggal}}</td>
                <td>{{'RP '.format_uang($head->totalbayar)}}</td>
                <td>{{'RP '.format_uang($head->bayar)}}</td>
                <td>{{'RP '.format_uang($head->kembalian)}}</td>
                </td>
                <td><a href="cek" class="btn btn-outline-primary btn-sm d-flex justify-content-center">Lihat Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal Tambah-->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Suplier</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('pembelian-table')
                </div>
            </div>


        </div>
    </div>

</div>


@endsection