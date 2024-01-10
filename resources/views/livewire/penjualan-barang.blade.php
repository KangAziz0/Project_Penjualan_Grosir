<div>
    <div class="d-flex " style="justify-content: end;">
        <input type="text" class="form-control" style="width: 300px;" wire:model.live="search" placeholder="Cari Data">
    </div>

    <table class="table table-striped mt-2">
        <thead class="">
            <tr>
                <th>Id</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1 + (($barang->currentPage() - 1) * $barang->perPage());
            @endphp
            @foreach($barang as $data)

            @if($data->stok == 0 )
            <tr>
            </tr>
            @else
            <tr>
                <td><?= $no++ ?></td>
                <td class="text-success">{{$data->nama_barang}}</td>
                <td>{{$data->nama_barang}}</td>
                <td>{{$data->harga_jual}}</td>
                <td>{{$data->stok}}</td>
                <td>
                    <a href="detailJual-barang/{{$data->id_barang}}/{{$data->harga_jual}}/{{$data->harga_awal}}" class="btn btn-success btn-sm btn-flat">
                        <i class="fa-solid fa-check"></i> Pilih
                    </a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <div class="d-flex mb-3" style="justify-content: space-between;">
        {{$barang->links()}}
    </div>

</div>