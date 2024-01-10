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
            padding: 10px 25px;
            font-size: 12px;
        }
        .footers {
            width: 100%;
        }

        .footers tr th {
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="head">
        <h3>Laporan Pembelian</h3>
    </div>
    <table>
        <tr>
            <th>Tanggal :</th>
            <th>{{$tanggalAwal}} Sampai Dengan {{$tanggalAkhir}}</th>
        </tr>
    </table>
    <table border="1" cellpadding="0" cellspacing="0" class="footers">
        <thead>
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
    <table border="1" class="footers" cellpadding="0" cellspacing="0">
        <tr>
            <th style="background-color: yellowgreen;">Pembelian</th>
        </tr>
        <tr>
            <th>{{'Rp.'.format_uang($total)}}</th>
        </tr>
    </table>
</body>

</html>