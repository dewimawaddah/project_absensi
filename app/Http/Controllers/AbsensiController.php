<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Exports\AbsensiExport;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::where('tanggal', date('d/m/Y'))->get();
        $pegawai = Pegawai::all();
        return view('absensi.index', compact('pegawai', 'absensi'));
    }

    public function absensiExport()
    {
        return Excel::download(new AbsensiExport, 'absensi.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi.',
            'exists' => ':attribute tidak ditemukan.'
        ];
        $validator = Validator::make($request->all(), [
            'nik' => 'required|exists:pegawai,nik'
        ], $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('absensi.index')
                ->withErrors($validator)
                ->withInput();
        } else {
            // TODO Dewi: Validation: cari tahu apakah di tanggal hari ini, pegawai dengan nik yg ada di $request sudah ada atau belum datanya.

            $data_absensi = Absensi::where('tanggal', date('d/m/Y'))->where('nik_pegawai', $request->nik)->first();
            // TODO Dewi: jika data absensinya ada, cek apakah jam keluarnya sudah diisi, jika sudah buat dia error / kembali ke halaman sebelumnya

            if ($data_absensi) {
                $data_absensi = false;
                $absensi2 = Absensi::where('tanggal', date('d/m/Y'))->where('nik_pegawai', $request->nik)->whereNotNull('jam_masuk')->first();
                if ($absensi2) {
                    $absensi2->update([
                        'jam_keluar' => date("H:i:s")
                    ]);
                }
            } else {
                $pegawai = Pegawai::where('nik', $request->nik)->first();
                // TODO Dewi: Setelah membuat field di migration baru, tambahkan disini. cari tahu bagaimana caranya di php mengetahui tanggal hari ini, lalu bagaimana cara mengetahui jam:menit:detik hari ini.
                $tanggal = date("d/m/Y");
                $jam_masuk = date("H:i:s");
                $absensi = Absensi::create([
                    'nik_pegawai' => $pegawai->nik,
                    'full_name_pegawai' => $pegawai->full_name,
                    'tanggal' => $tanggal,
                    'jam_masuk' => $jam_masuk,
                ]);

                $absensi->update([
                    'jam_keluar' => null
                ]);
            }

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
