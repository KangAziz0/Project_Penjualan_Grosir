@extends('index')
@section('title','History')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama Petugas</th>
            <th>Tanggal</th>
            <th>Aktivitas</th>
            <th>Deskripsi</th>
            <th>Properti</th>
        </tr>
    </thead>
    <tbody>
        @foreach($history  as $data)
        <tr>
            <td>{{$data->causer->name}}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection