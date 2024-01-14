@extends('index')
@section('title','Barang')
@section('content')

@livewire('barang-table')

<!-- Modal Tambah-->
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('barang.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Id Barang</label>
                                <input type="text" class="form-control" name="id_barang" value="{{old('id_barang')}}" placeholder="Masukan No Barang" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" class="form-control  @error('nama')
                is-invalid @enderror" name="nama" placeholder="Masukan Nama Barang" value="{{old('nama')}}" required>
                                @error('nama')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="id_kategori" id="" class="form-select" required>
                                    <option disabled>Pilih Satu</option>
                                    @foreach($kategori as $kategoris)
                                    <option value="{{$kategoris->id_kategori}}">{{$kategoris->nama_kategori}}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <!-- <div class="mb-3">
                                <label class="form-label">Harga Awal</label>
                                <input type="number" class="form-control  @error('harga_awal')
                is-invalid @enderror" name="harga_awal" placeholder="Masukan harga awal" value="{{old('harga_awal')}}" required>
                                @error('harga_awal')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div> -->
                            <!-- <div class="mb-3">
                                <label class="form-label">Harga Jual</label>
                                <input type="number" class="form-control  @error('harga_jual')
                is-invalid @enderror" name="harga_jual" placeholder="Masukan harga jual" value="{{old('harga_jual')}}" required>
                                @error('harga_jual')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="text" class="form-control  @error('stok')
                is-invalid @enderror" name="stok" placeholder="Masukan stok" value="{{old('stok')}}" required>
                                @error('stok')
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