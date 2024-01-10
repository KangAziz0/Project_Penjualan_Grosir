<div>
    <div class="d-flex " style="justify-content: space-between;">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Data
        </button>
        <input type="text" class="form-control" style="width: 300px;" wire:model.live="search" placeholder="Cari Data">
    </div>

    <table class="table table-striped table-bordered mt-3">
        <thead class="">
            <tr>
                <th>Id</th>
                <th>Kode Suplier</th>
                <th>Nama</th>
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
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$data->kode_suplier}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus{{$data->kode_suplier}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex mb-3" style="justify-content: space-between;">
        Showing 1 to 10 of 100 entries
        {{$suplier->links()}}
    </div>

    <!-- Modal Edit -->
    @foreach($suplier as $list)
    <div class="modal fade" id="ModalEdit{{$list->kode_suplier}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Suplier</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="/update-s/{{$list->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">KodeSuplier</label>
                                    <input type="text" class="form-control" name="kode_suplier" value="{{$list->kode_suplier}}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Suplier</label>
                                    <input type="text" class="form-control" name="nama" value="{{$list->nama_suplier}}">
                                    @error('nama')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control  @error('alamat')
                is-invalid @enderror" name="alamat" placeholder="Masukan alamat" value="{{$list->alamat}}">
                                    @error('alamat')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">no_telepon</label>
                                    <input type="text" class="form-control  @error('notlp')
                is-invalid @enderror" name="notlp" placeholder="Masukan notlp" value="{{$list->no_telepon}}">
                                    @error('notlp')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @endforeach


    <!-- Modal Hapus -->
    @foreach($suplier as $list)
    <div class="modal fade" id="ModalHapus{{$list->kode_suplier}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Suplier</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h6>Apakah Anda Ini Menghapus Suplier Dengan Id-Suplier = {{$list->kode_suplier}}</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="{{$list->kode_suplier}}/destroy-s"><button type="submit" class="btn btn-danger">Hapus</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>