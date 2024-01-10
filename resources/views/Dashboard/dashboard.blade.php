@extends('index')
@section('Dashboard')

@section('content')
<!-- <div class="py-2"> -->
<div class="row g-2">
    <div class="col-12 col-sm-6 col-lg-3 ">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between" style="background-color: #00A9FF;color:white;">
            <div>
                <div class="summary-icon bg-primary mb-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="mt-2" style="font-weight: 600;">Penjualan</div>
            </div>
            <h4 class="mt-4">{{$penjualan}} Kali</h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between" style="background-color: #65B741;color: white;">
            <div>
                <div class="summary-icon bg-success mb-2">
                    <i class="fa-solid fa-clipboard"></i>
                </div>
                <div class="mt-2" style="font-weight: 600;">Pembelian</div>
            </div>
            <h4 class="mt-4">{{$pembelian}} Kali</h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between" style="background-color:  #FFB534;color: white;">
            <div>
                <div class="summary-icon mb-2" style="background-color: #994D1C">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>
                <div class="mt-2" style="font-weight: 600;">Pendapatan</div>
            </div>
            <h4 class="mt-4">{{'Rp.'.format_uang($pendapatan)}}</h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between" style="background-color: #7071E8;color:white;">
            <div>
                <div class="summary-icon mb-2" style="background-color: #BB9CC0;">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="mt-2" style="font-weight: 600;">Petugas</div>
            </div>
            <h4 class="mt-4">{{$petugas}} Orang</h4>
        </div>
    </div>

</div>

<div class="mt-3" style="display: flex; justify-content: space-between;">
    <div style="width: 25%;">
    </div>
    <div class="shadow" style="width: 75%;">
    {!! $charts->container() !!}

    </div>
</div>
<!-- </div> -->
<script src="{{ $charts->cdn() }}"></script>
{{ $charts->script() }}
@endsection