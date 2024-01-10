@extends('index')
@section('title','kategori')
@section('content')
@livewire('kategori-table')


<!-- Modal Tambah-->
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('kategori.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control  @error('nama')
                is-invalid @enderror" name="nama" placeholder="Masukan nama" value="{{old('nama')}}">
                                @error('nama')
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