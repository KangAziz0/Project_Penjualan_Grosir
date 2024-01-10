<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Penjualan</title>
    <style>
        * {
            font-family: 'consolas', sans-serif;
        }

        .text-center {
            text-align: center;
        }

        table td {
            font-size: 11pt;
        }

        p {
            display: block;
            margin: 3;
            font-size: 10pt;
        }

        .text-right {
            float: right;
        }

        @media print {
            @page {
                margin: 0;
                size: 80mm 100%;

            }

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <p style="font-size: 20px; font-weight:600 ;">Toko Sabil</p>
            <p>Bandung Kp.Dundus Lembu Girang</p>
        </div>
        <div class="">
            <p style="float: left;">{{$theadjual->tanggal}}</p>
            <p style="float: right;">{{$theadjual->petugas->nama_petugas}}</p>
        </div>
        <div class="clear-both" style="clear: both;">
            <p>{{$theadjual->notrans}}</p>
        </div>
        <p class="text-center">=============================================</p>
        <table style="width: 100%;border:0;">
            @foreach($detail as $data)
            <tr>
                <td colspan="1">{{$data->barang[0]->nama_barang}}</td>
            </tr>
            <tr>
                <td>{{$data->qty}} x {{'Rp.'.format_uang($data->harga_jual)}}</td>
                <td></td>
                <td class="text-right">{{'Rp.'.format_uang($data->subtotal)}}</td>
            </tr>
            @endforeach
        </table>
        <p class="text-center">=============================================</p>
        <table width="100%" style="border: 0;">
            <tr>
                <td>Total Harga</td>
                <td class="text-right">{{'Rp.'.format_uang($theadjual->totalbayar)}}</td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td class="text-right">{{'Rp.'.format_uang($theadjual->bayar)}}</td>
            </tr>
            <tr>
                <td>Total kembalian</td>
                <td class="text-right">{{'Rp.'.format_uang($theadjual->kembalian)}}</td>
            </tr>
        </table>
        <p class="text-center">=============================================</p>

        <p class="text-center">--- 😂 Terima Kasih 😂 ---</p>
        <p class="text-center">Jualan Itu Ibadah Mau Beli Alhamdulillah</p>
    </div>
    <script>
        window.print()
    </script>
</body>

</html>