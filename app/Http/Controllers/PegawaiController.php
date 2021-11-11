<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.create', compact('pegawai'));
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
            'required' => 'attribute wajib diisi.',
            // 'unique' => 'harus unique :min',
        ];
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:pegawai,nik|digits:16',
            'full_name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'address' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect('pegawai/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $pegawai = Pegawai::create([
                'nik' => $request->nik,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'mobile_number' => $request->mobile_number,
                'address' => $request->address
            ]);
        }

        return redirect()->route('pegawai.index');
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
        $pegawai = Pegawai::find($id);
        return view('pegawai.edit', compact('pegawai'));
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
        $messages = [
            'required' => 'attribute wajib diisi.',
            // 'unique' => 'harus unique :min',
        ];
        $validator = Validator::make($request->all(), [
            'nik' => "required|unique:pegawai,nik," . $id . "|digits:16",
            'full_name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'address' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Pegawai::find($id)->update([
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address
        ]);
        return redirect()->route('pegawai.index');
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
