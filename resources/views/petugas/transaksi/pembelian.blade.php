@extends('index')
@section('title','Transaksi Pembelian')
@section('content')

<div>
    <h3 class="d-flex justify-content-center text-success">Daftar Pembelian</h3>

    @livewire('data-transaksi-beli')

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