<div>
    <div class="d-flex " style="justify-content: space-between;">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Data
        </button>
        <input type="text" class="form-control" style="width: 300px;" wire:model.live="search" placeholder="Cari Data">
    </div>

    <table class="table mt-2">

        <thead class="table-success">
            <tr>
                <th>No Trans</th>
                <th>Tanggal</th>
                <th>Suplier</th>
                <th>Total Item</th>
                <th>Total harga</th>
                <th>Total Bayar</th>
                <th class="d-flex justify-content-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($thead as $head)
            <tr>
                <td>{{$head->notrans}}</td>
                <td>{{$head->tanggal}}</td>
                <td>{{$head->suplier->nama_suplier}}</td>
                <td>{{$head->totalitem}}</td>
                <td>{{'RP '.format_uang($head->totalbayar)}}</td>
                <td>{{'RP '.format_uang($head->totalharga)}}</td>
                </td>
                <td><a href="test/{{$head->notrans}}/{{$head->id_suplier}}" class="btn btn-outline-primary btn-sm d-flex justify-content-center">Lihat Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex mb-3" style="justify-content: space-between;">
        Showing 1 to 10 of 100 entries
        {{$thead->links()}}
    </div>
</div>