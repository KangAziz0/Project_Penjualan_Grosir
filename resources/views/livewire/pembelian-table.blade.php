<div>
    <div class="d-flex " style="justify-content: end;">
        <input type="text" class="form-control" style="width: 300px;" wire:model.live="search" placeholder="Cari Data">
    </div>

    <table class="table table-striped mt-2">
        <thead class="">
            <tr>
                <th>Id</th>
                <th>Kode Suplier</th>
                <th>Nama Suplier</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th class="d-flex justify-content-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1 + (($suplier->currentPage() - 1) * $suplier->perPage());
            @endphp
            @foreach($suplier as $data)
            <tr>
                <td><?= $no++ ?></td>
                <td class="text-success">{{$data->kode_suplier}}</td>
                <td>{{$data->nama_suplier}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->no_telepon}}</td>
                <td class="d-flex justify-content-center" style="gap: 2px;">
                    <a href="{{route('pembelian.create',$data->id)}}" class="btn btn-success btn-sm btn-flat">
                        <i class="fa-solid fa-check"></i> Pilih
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex mb-3" style="justify-content: space-between;">
        Showing 1 to 10 of 100 entries
        {{$suplier->links()}}
    </div>

</div>