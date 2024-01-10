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
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Jabatan</th>
                <th>Agama</th>
                <th>No Telepon</th>
                <th class="d-flex justify-content-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach($users as $petugass)
            <tr>
                <td><?= $no++ ?></td>
                <td>{{$petugass->nama_petugas}}</td>
                <td>{{$petugass->jenis_kelamin}}</td>
                <td>{{$petugass->Alamat}}</td>
                <td>{{$petugass->role}}</td>
                <td>{{$petugass->agama}}</td>
                <td>{{$petugass->no_telepon}}</td>
                <td class="d-flex justify-content-center" style="gap: 3px;">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$petugass->kode_petugas}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus{{$petugass->kode_petugas}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-2 d-flex" style="justify-content: space-between;">
        {{$users->links()}}
    </div>


    <!-- Modal Edit -->
    @foreach($users as $petugass)
    <div class="modal fade" id="ModalEdit{{$petugass->kode_petugas}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="/update-p/{{$petugass->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">KodePetugas</label>
                                    <input type="text" class="form-control" name="kode" value="{{$petugass->kode_petugas}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Petugas</label>
                                    <input type="text" class="form-control  @error('nama')
                is-invalid @enderror" name="nama" placeholder="Masukan nama" value="{{$petugass->nama_petugas}}">
                                    @error('nama')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">jenis kelamin</label>
                                    <select name="jk" id="" class="form-select">
                                        <option value="{{$petugass->jenis_kelamin}}">{{$petugass->jenis_kelamin}}</option>
                                        @if($petugass->jenis_kelamin == "Laki-laki")
                                        <option value="Perempuan">Perempuan</option>
                                        @else
                                        <option value="Laki-laki">Laki-laki</option>
                                        @endif
                                    </select>
                                    @error('alamat')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control  @error('alamat')
                is-invalid @enderror" name="alamat" placeholder="Masukan alamat" value="{{$petugass->Alamat}}">
                                    @error('alamat')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <select name="jabatan" id="" class="form-select">
                                        <option value="{{$petugass->role}}">{{$petugass->role}}</option>
                                    </select>
                                    @error('jabatan')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <select name="agama" id="" class="form-select">
                                        <option value="{{$petugass->agama}}">{{$petugass->agama}}</option>
                                        <option value="Islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                    </select>
                                    @error('agama')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No Telepon</label>
                                    <input type="text" class="form-control  @error('notlp')
                is-invalid @enderror" name="notlp" placeholder="Masukan notlp" value="{{$petugass->no_telepon}}">
                                    @error('notlp')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

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


    <!-- Modal Hapus -->
    <div class="modal fade" id="ModalHapus{{$petugass->kode_petugas}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h6>Apakah Anda Ini Menghapus Petugas Dengan Kode-Petugas = {{$petugass->kode_petugas}}</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="{{$petugass->kode_petugas}}/destroy-p"><button type="submit" class="btn btn-danger">Hapus</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="ModalLogin{{$petugass->kode_petugas}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar UserLogin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('hak.store')}}" method="post">
                                @csrf
                                <div class="mb-3" hidden>
                                    <label class="form-label">KodePetugas</label>
                                    <input type="text" class="form-control" name="kode_petugas" value="{{$petugass->id}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control  @error('nama')
                is-invalid @enderror" name="nama" placeholder="Masukan Username" value="{{old('nama')}}">
                                    @error('nama')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control  @error('email')
                is-invalid @enderror" name="email" placeholder="Masukan email" value="{{old('email')}}">
                                    @error('email')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control  @error('password')
                is-invalid @enderror" name="password" placeholder="Masukan password" value="{{old('password')}}">
                                    @error('password')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select">
                                        <option value="{{$petugass->jabatan}}">{{$petugass->jabatan}}</option>
                                        <!-- <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option> -->
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>

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

    @endforeach
</div>