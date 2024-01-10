<div>
    <div class="d-flex " style="justify-content: space-between;">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Data
        </button>
        <input type="text" class="form-control" style="width: 300px;" wire:model.live="search" placeholder="Cari Data">
    </div>
    <table class="table table-striped mt-2 table-bordered">
        <thead class="">
            <tr>
                <th>Id</th>
                <th style="width: 70%;">Kategori</th>
                <th class="d-flex justify-content-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no  = 1; ?>
            @foreach($kategori as $data)
            <tr>
                <td><?= $no++ ?></td>
                <td>{{$data->nama_kategori}}</td>
                <td class="d-flex justify-content-center" style="gap: 5px;">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$data->id_suplier}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus{{$data->id_suplier}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>