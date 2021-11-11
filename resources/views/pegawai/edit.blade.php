@extends('layouts.index')

@section('judul')
Halaman Pegawai
@endsection

@section('konten')
<h2>Edit Data Pegawai</h2>
<form method="POST" action="{{ route('pegawai.update', ['pegawai'=>$pegawai->id]) }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" placeholder="masukkan nomor induk kependudukan"
            value="{{ $pegawai->nik }}">
        @error('nik')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="full_name">Nama Lengkap</label>
        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="masukkan nama lengkap"
            value="{{ $pegawai->full_name }}">
        @error('full_name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="masukkan email"
            value="{{ $pegawai->email }}">
        @error('email')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="mobile_number">No. Telepon</label>
        <input type="text" class="form-control" id="mobile_number" name="mobile_number"
            placeholder="masukkan Nomor Telepon" value="{{ $pegawai->mobile_number }}">
        @error('mobile_number')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="address">Alamat Lengkap</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="masukkan alamat lengkap"
            value="{{ $pegawai->address }}">
        @error('address')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
