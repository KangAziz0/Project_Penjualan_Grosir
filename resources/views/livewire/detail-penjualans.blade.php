<div>
    <div>
        <div class="d-flex " style="justify-content: end; ">
            <!-- <h3 class="text-success" style="font-weight: 600;font-size: 25px;">Transaksi Pembelian</h3> -->
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                <i class="fa-solid fa-plus"></i> Pilih Barang
            </button>
        </div>
        <div class="box d-flex justify-content-space-between">
            @foreach($petugas as $data)
            <table class="table table-sm table-borderless" style="font-weight: 600;font-size: 16px;">
                <tr>
                    <td style="width: 140px;">Kode Petugas </td>
                    <td> : {{$data->kode_petugas}}</td>
                <tr>
                    <td>Nama Petugas </td>
                    <td>: {{$data->nama_petugas}}</td>
                </tr>
                <tr>
                    <td>No Telepon </td>
                    <td> : {{$data->no_telepon}}</td>
                </tr>
            </table>
            @endforeach
            <table class="table table-borderless" style="font-weight: 600;font-size: 15px;">
                <tr>
                    @foreach($notrans as $result)
                    <td style="width: 10%;">NoTransaksi </td>
                    <td> : {{$result->notrans}}</td>
                    <td style="width: 10%;">Tanggal </td>
                    <td> : {{$result->tanggal}}</td>
                    @endforeach
                </tr>

            </table>

        </div>
        <table class="table table-striped table-bordered mt-2">
            <thead class="table-success">
                <tr>
                    <th>Id</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual</th>
                    <th class="d-flex justify-content-center">Jumlah</th>
                    <th>Subtotal</th>
                    <th class="d-flex justify-content-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>

                @foreach($detail as $key => $data)
                <tr>
                    @php $subtotal = $data->harga_jual * $data->qty @endphp
                    <td><?= $no++ ?></td>

                    <td class="text-success">{{$data->barang[0]['nama_barang']}}</td>
                    <td class="harga" name="harga_jual">{{'RP '.format_uang($data->harga_jual)}}</td>
                    <td class="d-flex justify-content-center" style="gap: 2px;">
                        <button type="button" wire:loading.attr="disabled" wire:click="decrementQuantity({{$data->id_barang}})" name="qty" class="btn btn-sm btn-danger"><i class="fa-solid fa-minus"></i></button>
                        <input type="text" class="quantity" data-id="{{$data->id_barang}}" name="qty" style="width:35px;" value="{{$data->qty}}">
                   
                        <button type="button" wire:loading.attr="disabled" wire:click="incrementQuantity({{$data->id_barang}})" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i></button>
                    </td>
                    <td>{{'RP '.format_uang($subtotal)}}</td>

                    @php $totalPrice += $data->harga_jual * $data->qty @endphp
                    <td class="d-flex justify-content-center" style="gap: 2px;">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus{{$data->id_barang}}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>



                <div class="modal fade" id="ModalHapus{{$data->id_barang}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Apakah Anda Ini Menghapus barang Dengan Id-Barang = {{$data->id_barang}}</h6>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <a href="{{$data->id_barang}}/destroy-TJ"><button type="submit" class="btn btn-danger">Hapus</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                @endforeach
            </tbody>
        </table>

    </div>


    <!--  -->
    <div class="d-flex justify-content-end row">
        <div class="col-lg-8">
            <div class="tampil-bayar bg-primary"></div>
            <div class="tampil-berbilang"></div>
        </div>
        <div class="col-lg-5">
            <form action="{{route('detail.jual')}}" method="post">
                @csrf
                <div class="form-group row mb-2">
                    <label class="col-lg-3 control-label" style="font-size: 17px; font-weight: 600;">Total : </label>
                    <div class="col-lg-8" style="font-size: 17px;font-weight: 600;">
                        <input type="number" name="totalharga" id="total" class="form-control" style="font-weight: 600;font-size: 17px;" value="{{$totalPrice}}" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-lg-3 control-label" style="font-size: 17px; font-weight: 600;">Bayar : </label>
                    <div class="col-lg-8" style="font-size: 17px;font-weight: 600;">
                        <input type="number" name="totalbayar" id="bayar" onkeyup="BayarValue()" class="form-control" style="font-weight: 600;font-size: 17px;">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-lg-3 control-label" style="font-size: 17px; font-weight: 600;">Kembalian : </label>
                    <div class="col-lg-8" style="font-size: 17px;font-weight: 600;">
                        <input type="number" name="kembalian" id="kembalian" class="form-control" readonly style="font-weight: 600;font-size: 17px;">
                    </div>
                </div>
                <div class="box-footer col-lg-11 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-sm" onclick="welcome()">
                        <i class="fa-solid fa-check"></i> Simpan Transaksi
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('penjualan-barang')
                </div>
            </div>
        </div>
    </div>


    <script>
        function BayarValue() {
            const total = document.querySelector('#total').value
            const bayar = document.querySelector('#bayar').value
            const kembalian = parseInt(bayar) - parseInt(total)

            document.querySelector('#kembalian').value = kembalian
        }
    </script>

</div>