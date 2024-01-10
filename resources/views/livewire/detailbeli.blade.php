<div>
    <div>
        <div class="d-flex " style="justify-content: end; ">
            <!-- <h3 class="text-success" style="font-weight: 600;font-size: 25px;">Transaksi Pembelian</h3> -->
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                <i class="fa-solid fa-plus"></i> Pilih Barang
            </button>
        </div>
        @foreach($suplier as $key => $data)
        <div class="box d-flex justify-content-space-between">
            <table class="table table-sm table-borderless" style="font-weight: 600;font-size: 15px;">
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
            <table class="table table-borderless" style="font-weight: 600;font-size: 15px;">
                <tr>
                    @foreach($notrans as $result)
                    <td style="width: 15%;">NoTransaksi :</td>
                    <td style="width: 35%;">{{$result->notrans}}</td>
                    <td style="width: 13%;">Tanggal :</td>
                    <td style="width: 17%;">{{$result->tanggal}}</td>
                    @endforeach
                </tr>

            </table>

        </div>
        <table class="table table-striped table-bordered mt-2">
            <thead class="table-success">
                <tr>
                    <th>Id</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th class="d-flex justify-content-center">Jumlah</th>
                    <th>Subtotal</th>
                    <th class="d-flex justify-content-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>

                @foreach($detail as $key => $data)
                <tr>
                    @php $subtotal = $data->harga_beli * $data->qty @endphp
                    <td><?= $no++ ?></td>

                    <td class="text-success">{{$data->barang[0]['nama_barang']}}</td>
                    <td class="harga" name="harga_beli">{{'RP '.format_uang($data->harga_beli)}}</td>
                    <td class="d-flex justify-content-center" style="gap: 2px;">
                        <button type="button" wire:loading.attr="disabled" wire:click="decrementQuantity({{$data->id_barang}})" name="qty" class="btn btn-sm btn-danger"><i class="fa-solid fa-minus"></i></button>
                        <input type="text" class="quantity" data-id="{{$data->id_barang}}" name="qty" style="width:35px;" value="{{$data->qty}}">
                        <button type="button" wire:loading.attr="disabled" wire:click="incrementQuantity({{$data->id_barang}})" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i></button>
                    </td>
                    <td>{{$subtotal}}</td>

                    @php $totalPrice += $data->harga_beli * $data->qty @endphp

                    @php $totalItem += $data->qty @endphp
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
                                    <a href="{{$data->id_barang}}/destroy-TS"><button type="submit" class="btn btn-danger">Hapus</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end row">
            <div class="col-lg-8">
                <div class="tampil-bayar bg-primary"></div>
                <div class="tampil-berbilang"></div>
            </div>
            <div class="col-lg-5">
                <form action="{{route('detail.store')}}" method="post">
                    @csrf
                    <!-- <input type="hidden" > -->
                    <input type="hidden" name="totalbayar" id="total">
                    <input type="hidden" name="totalitem" id="total_item">
                    <input type="hidden" name="totalharga" id="total_item">

                    <div class="form-group row mb-2">
                        <label class="col-lg-3 control-label" style="font-size: 17px; font-weight: 600;">Total Item: </label>
                        <div class="col-lg-8" style="font-size: 17px;font-weight: 600;">
                            <input type="number" name="totalitem" class="form-control" required style="font-weight: 600;font-size: 17px;" value="{{$totalItem}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-lg-3 control-label" style="font-size: 17px; font-weight: 600;">Total : </label>
                        <div class="col-lg-8" style="font-size: 17px;font-weight: 600;">
                            <input type="number" name="totalharga" class="form-control" required style="font-weight: 600;font-size: 17px;" value="{{$totalPrice}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-lg-3 control-label" style="font-size: 17px; font-weight: 600;">Bayar : </label>
                        <div class="col-lg-8">
                            <input type="number" name="totalbayar" id="bayar" class="form-control" required style="font-weight: 600;font-size: 17px;" value="{{$totalPrice}}" readonly>
                        </div>
                    </div>
                    <div class="box-footer mt-2">
                        <button type="submit" class="btn btn-success btn-sm" style="margin-left: 300px;">
                            <i class="fa-solid fa-check"></i> Simpan Transaksi
                        </button>
                    </div>
                </form>

            </div>
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
                    @livewire('detailbeli-table')
                </div>
            </div>
        </div>
    </div>

</div>