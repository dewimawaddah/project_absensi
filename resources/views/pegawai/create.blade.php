@extends('layouts.index')

@section('judul')
Halaman Pegawai
@endsection

@section('konten')
<h2>Tambah Data Pegawai</h2>
<form method="POST" action="{{ route('pegawai.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" placeholder="masukkan nomor induk kependudukan">
        @error('nik')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="full_name">Nama Lengkap</label>
        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="masukkan nama lengkap">
        @error('full_name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="masukkan email">
        @error('email')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="mobile_number">No. Telepon</label>
        <input type="text" class="form-control" id="mobile_number" name="mobile_number"
            placeholder="masukkan Nomor Telepon">
        @error('mobile_number')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="address">Alamat Lengkap</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="masukkan alamat lengkap">
        @error('address')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <a href="{{ route('pegawai.index') }}" class="btn btn-primary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
