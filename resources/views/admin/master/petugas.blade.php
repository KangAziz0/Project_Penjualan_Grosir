@extends('index')
@section('title','Petugas')
@section('content')

@livewire('petugas-table')

 <!-- Modal Tambah -->
 <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Petugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('petugas.store')}}" method="post">
                            @csrf
                           
                            <div class="mb-3">
                                <label class="form-label">Nama Petugas</label>
                                <input type="text" class="form-control  @error('nama')
                is-invalid @enderror" name="nama" placeholder="Masukan nama" value="{{old('nama')}}">
                                @error('nama')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">jenis kelamin</label>
                                <select name="jk" id="" class="form-select">
                                    <option disabled value="{{old('jk')}}">Pilih Satu</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('alamat')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control  @error('alamat')
                is-invalid @enderror" name="alamat" placeholder="Masukan alamat" value="{{old('alamat')}}">
                                @error('alamat')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <select name="jabatan" id="" class="form-select">
                                    <option disabled value="{{old('jabatan')}}">Pilih Satu</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                </select>
                                @error('jabatan')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <select name="agama" id="" class="form-select">
                                    <option disabled value="{{old('agama')}}">Pilih Satu</option>
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
                is-invalid @enderror" name="notlp" placeholder="Masukan notlp" value="{{old('notlp')}}">
                                @error('notlp')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control  @error('password')
                is-invalid @enderror" name="password" placeholder="Masukan Password" value="{{old('password')}}">
                                @error('password')
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

@endsection 