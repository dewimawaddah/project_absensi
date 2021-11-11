@extends('layouts.index')

@section('judul')
Halaman Absensi
@endsection

@section('konten')
<h3>Data Absensi</h3>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Waktu Masuk</th>
            <th scope="col">Waktu Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pegawai as $pegawai)
        <tr>
            {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
            <td>{{ $pegawai->nik }}</td>
            <td>{{ $pegawai->full_name }}</td>
            <td>{{ $pegawai->created_at }}</td>
            <td>{{ $pegawai->updated_at }}</td>
            {{-- <td>{{ $pegawai->address }}</td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
