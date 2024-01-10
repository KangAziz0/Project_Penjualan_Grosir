<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: 'consolas', sans-serif;
        }

        .head {
            width: 100%;
            height: 70px;
            border: 1px solid red;
            background-color: orange;
            display: flex;
            text-align: center;
        }

        .tanggal {
            display: flex;
            justify-content: center;
        }

        table tr td,
        table tr th {
            padding: 10px 10px;
            font-size: 12px;
        }

        .footer {
            width: 100%;
        }

        .footer tr th {
            font-size: 15px;
        }
    </style>
</head>

<body>
    @php $laba = 0; @endphp
    <div class="head">
        <h3>Laporan Penjualan</h3>
    </div>
    <table>
        <tr>
            <th>Tanggal :</th>
            <th>{{$tanggalAwal}} Sampai Dengan {{$tanggalAkhir}}</th>
        </tr>
    </table>
    <table border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr align="left">
                <th style="">No Trans</th>
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
    <table border="1" class="footer" cellpadding="0" cellspacing="0">
        <tr>
            <th style="background-color: orange;">Pendapatan</th>
            <th style="background-color: greenyellow;">Laba</th>
        </tr>
        <tr>
            <th>{{'Rp.'.format_uang($total)}}</th>
            <th>{{'Rp.'.format_uang($laba)}}</th>
        </tr>
    </table>
</body>

</html>