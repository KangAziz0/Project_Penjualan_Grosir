<div>
    <div class="d-flex " style="justify-content: space-between;">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Data
        </button>
        <input type="text" class="form-control" style="width: 300px;" wire:model.live="search" placeholder="Cari Data">
    </div>
    <table class="table table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>No.Barang</th>
                <th>Nama Barang</th>
                <th>kategori</th>
                <th>Harga_Awal</th>
                <th>Harga_Jual</th>
                <th>stok</th>
                <th class="d-flex justify-content-center ">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($barang as $barangs)
            <tr>
                <td><?= $no++ ?></td>
                <td class="text-success">{{$barangs->id_barang}}</td>
                <td>{{$barangs->nama_barang}}</td>
                <td>{{$barangs->kategori->nama_kategori}}</td>
                <td>{{$barangs->harga_awal}}</td>
                <td>{{$barangs->harga_jual}}</td>
                <td>{{$barangs->stok}}</td>
                <td class="d-flex justify-content-center" style="gap: 2px;">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$barangs->id_barang}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus{{$barangs->id_barang}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex mb-3" style="justify-content: space-between;">
        Showing 1 to 10 of 100 entries
        {{$barang->links()}}
    </div>
    <!-- Modal Hapus -->
    @foreach($barang as $barangs)
    <div class="modal fade" id="ModalHapus{{$barangs->id_barang}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h6>Apakah Anda Ini Menghapus barang Dengan Id-Barang = {{$barangs->id_barang}}</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="{{url($barangs->id_barang.'/destroy')}}"><button type="submit" class="btn btn-danger">Hapus</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach


    <!-- Modal Edit -->
    @foreach($barang as $barangs)
    <div class="modal fade" id="ModalEdit{{$barangs->id_barang}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="/update-b/{{$barangs->id_barang}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">KodeBarang</label>
                                    <input type="text" class="form-control" name="kode" value="{{$barangs->id_barang}}" disabled>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">NamaBarang</label>
                                    <input type="text" class="form-control" name="nama" value="{{$barangs->nama_barang}}">
                                    @error('nama')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-select">
                                        <option disabled>Pilih Satu</option>
                                        @foreach($kategori as $kategoris)
                                        <option value="{{$kategoris->id_kategori}}">{{$kategoris->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                               
                                <div class="mb-3">
                                    <label class="form-label">Harga Awal</label>
                                    <input type="number" class="form-control  @error('harga_awal')
                is-invalid @enderror" name="harga_awal" placeholder="Masukan HargaAwal" value="{{$barangs->harga_awal}}">
                                    @error('harga_awal')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga Jual</label>
                                    <input type="number" class="form-control  @error('harga_jual')
                is-invalid @enderror" name="harga_jual" placeholder="Masukan HargaJual" value="{{$barangs->harga_jual}}">
                                    @error('harga_jual')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stok</label>
                                    <input type="number" class="form-control  @error('stok')
                is-invalid @enderror" name="stok" placeholder="Masukan Stok" value="{{$barangs->stok}}">
                                    @error('stok')
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
</div>