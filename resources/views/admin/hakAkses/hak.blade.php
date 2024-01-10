@extends('index')
@section('title','Menu Hak')
@section('content')
<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalLogin">
    <i class="fa-solid fa-plus"></i> Tambah Data
</button>
<table class="table table-striped mt-2">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama petugas</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th class="d-flex justify-content-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach($user as $data)
        <tr>
            <td><?= $no++ ?></td>
            <td>{{$data->Petugas->nama_petugas}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->role}}</td>
            <td class="d-flex justify-content-center" style="gap: 2px;">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection