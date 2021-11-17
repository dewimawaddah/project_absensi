@extends('layouts.index')

@section('judul')
Halaman Pegawai
@endsection

@section('konten')

<div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pegawai
            <a href="{{ route('exportpegawai') }}" class="btn btn-success btn-sm float-right">Export</a>
            <a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-sm float-right mr-2">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telpon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telpon</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
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
                            <a href="{{ route('pegawai.edit', ['pegawai'=>$pegawai->id]) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <form method="post" action="{{ route('pegawai.destroy', ['pegawai'=>$pegawai->id]) }}"
                                class="d-inline">
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                @csrf
                                @method('delete')
                            </form>
                            <a href="{{ route('pegawai.show', ['pegawai'=>$pegawai->id]) }}"
                                class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
