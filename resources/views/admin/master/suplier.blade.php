@extends('index')
@section('content')

@livewire('supliertable')
<!-- Modal Tambah-->
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Suplier</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('suplier.store')}}" method="post">
                            @csrf
                          
                            <div class="mb-3">
                                <label class="form-label">Nama Suplier</label>
                                <input type="text" class="form-control  @error('nama')
                is-invalid @enderror" name="nama" placeholder="Masukan nama" value="{{old('nama')}}">
                                @error('nama')
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
                                <label class="form-label">No Telepon</label>
                                <input type="text" class="form-control  @error('notlp')
                is-invalid @enderror" name="notlp" placeholder="Masukan notlp" value="{{old('notlp')}}">
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




<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).on('keyup', function(e) {
        e.preventDefault();
        let search = $('#search').val();
        $.ajax({
            url: "{{route('search.suplier')}}",
            method: 'GET',
            data: {
                search: search
            },
            success: function(res) {
                $('#result').html(res)
            }
        })
    })
</script>
@endsection