@extends('layouts.index')

@section('judul')
Detail Data Pegawai
@endsection

@section('konten')
<h3>Detail Data Pegawai</h3>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <td>No</td>
            <td><strong>{{ $pegawai->id }}</strong></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td><strong>{{ $pegawai->nik }}</strong></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><strong>{{ $pegawai->full_name}}</strong></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><strong>{{ $pegawai->email}}</strong></td>
        </tr>
        <tr>
            <td>No. Telepone</td>
            <td><strong>{{ $pegawai->mobile_number}}</strong></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><strong>{{ $pegawai->address}}</strong></td>
        </tr>
    </thead>
</table>

<a href="{{ route('pegawai.index') }}" class="btn btn-primary btn-sm">Kembali</a>

@endsection
