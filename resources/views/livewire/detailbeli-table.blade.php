<div>
    <div class="d-flex " style="justify-content: end;">
        <input type="text" class="form-control" style="width: 300px;" wire:model.live="search" placeholder="Cari Data">
    </div>
    <style>
        .inputan {
            border: none;
        }
    </style>
    <table class="table table-bordered mt-2">
        <thead class="">
            <tr>
                <th>Id</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1 + (($barang->currentPage() - 1) * $barang->perPage());
            @endphp

            @foreach($barang as $data)
            <tr>
                @if($data->stok <= 15) <form action="detail-barang" method="post">
                    @csrf
                    <td><?= $no++ ?></td>
                    <td><input type="text" name="id_barang" class="text-success inputan" value="{{$data->id_barang}}"></td>
                    <td><input type="text" name="nama_barang" class="inputan" value="{{$data->nama_barang}}"></td>
                    <td><input type="text" name="stok" style="width: 100px;" class="inputan" value="{{$data->stok}}"></td>
                    <td><input type="text" name="harga_awal"   class="text-success" required value="{{$data->harga_awal}}"></td>
                    <td><input type="text" name="harga_jual" style="width: 200px;" class="text-success" required value="{{$data->harga_jual}}"></td>
                    <td>
                        <button type="submit" class="btn btn-success btn-sm btn-flat">
                            <i class="fa-solid fa-check"></i> Pilih
                        </button>
                    </td>
                    </form>
                    @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex mb-3" style="justify-content: space-between;">
        {{$barang->links()}}
    </div>

</div>