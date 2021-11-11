@extends('layouts.index')

@section('judul')
Halaman Pegawai
@endsection

@section('konten')
<a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Data</a>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            {{-- <th scope="col">No</th> --}}
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">No. Telepon</th>
            {{-- <th scope="col">Alamat</th> --}}
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pegawai as $pegawai)
        <tr>
            {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
            <td>{{ $pegawai->nik }}</td>
            <td>{{ $pegawai->full_name }}</td>
            <td>{{ $pegawai->email }}</td>
            <td>{{ $pegawai->mobile_number }}</td>
            {{-- <td>{{ $pegawai->address }}</td> --}}
            <td>
                <a href="{{ route('pegawai.edit', ['pegawai'=>$pegawai->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                <form method="post" action="{{ route('pegawai.destroy', ['pegawai'=>$pegawai->id]) }}" class="d-inline">
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                    @csrf
                    @method('delete')
                </form>
                <a href="{{ route('pegawai.show', ['pegawai'=>$pegawai->id]) }}" class="btn btn-info btn-sm">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
