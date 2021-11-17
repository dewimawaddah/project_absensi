@extends('layouts.index')

@section('judul')
Halaman Absensi
@endsection

@section('konten')
<form method="POST" id="form-absensi" action="{{ route('absensi.store') }}">
    @csrf
    <input type="text" name="nik" id="nik_pegawai" placeholder="enter NIK" class="form-control"
        value="{{ old('nik') }}">
    @error('nik')
    <small class="text-danger font-weight-bold" role="alert">
        <i>{{ $message }}</i>
    </small>
    @enderror
</form>

<div class="row">
    <div class="col my-2 text-right font-weight-bold">
        <h5 id="current_timestamp"></h5>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="tbl-pegawai" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pegawai as $pegawai)
                            <tr>
                                {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                <td>{{ $pegawai->nik }}</td>
                                <td>{{ $pegawai->full_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Absensi Hari ini ({{ date('d/m/Y') }})</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="tbl-absensi">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Absensi</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Absensi</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($absensi as $absensi)
                            <tr>
                                {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                <td>{{ $absensi->nik_pegawai }}</td>
                                <td>{{ $absensi->full_name_pegawai }}</td>
                                <td>{{ $absensi->tanggal }}</td>
                                <td>{{ $absensi->jam_masuk }}</td>
                                <td>{{ $absensi->jam_keluar }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    function current_timestamp() {
        var e = document.getElementById('current_timestamp'),
        d = new Date(), h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h +':'+ m +':'+ s;

        setTimeout('current_timestamp()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0'+ e : e;
        return e;
    }

    $(document).ready(function() {
        current_timestamp();

        $("#nik_pegawai").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#form-absensi").submit();
            }
        });
    });

</script>
@endpush

@endsection
