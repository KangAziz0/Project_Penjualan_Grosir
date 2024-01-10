@extends('index')
@section('title','Detail')
@section('content')

<div class="box d-flex justify-content-space-between">
    @foreach($suplier as $key => $data)
    <table class="table table-sm table-borderless" style="font-weight: 600;font-size: 16px;">
        <tr>
            <td style="width: 100px;">Supplier :</td>
            <td>{{$data->nama_suplier}}</td>
        <tr>
            <td>Telepon :</td>
            <td>{{$data->no_telepon}}</td>
        </tr>
        <tr>
            <td>Alamat :</td>
            <td>{{$data->alamat}}</td>
        </tr>
    </table>
    @endforeach
    @foreach($thead as $head)
    <table class="table table-sm table-borderless" style="font-weight: 600;font-size: 16px;">
        <tr>
            <td style="width: 20%;">NoTransaksi :</td>
            <td>{{$head->notrans}}</td>

            <td>Tanggal :</td>
            <td>{{$head->tanggal}}</td>
        </tr>
    </table>
    @endforeach
</div>
<table class="table">
    <thead class="table-light">
        <tr>
            <th>Nama Barang</th>
            <th>Harga Beli</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tdetail as $detail)
        <tr>
            <td>{{$detail->barang[0]->nama_barang}}</td>
            <td>{{'RP.'.format_uang($detail->harga_beli)}}</td>
            <td>{{$detail->qty}}</td>
            <td>{{'RP.'.format_uang($detail->subtotal)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@foreach($thead as $head)
<div class="col-lg-12 d-flex justify-content-space-between">
    <label style="width: 30%;height: 45px;font-size: 40px;font-weight: 600;display: flex;align-items: center;justify-content: center;">Total</label>
    <label class="bg-primary text-white" style="width: 70%;height: 45px;font-size: 40px;font-weight: 600;display: flex;align-items: center;justify-content: center;">{{'RP.'.format_uang($head->totalharga)}}</label>
</div>
@endforeach
@endsection