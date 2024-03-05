<?php

namespace App\Http\Controllers\DaftarOnline\Daftar;

use App\Http\Controllers\Controller;
use App\Models\Pasien\Pasien;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('daftar-online.pendaftaran.index');
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
        $this->validate($request, [
            'nik' => 'required|unique:data_pasiens',
        ], [
            'nik.unique' => 'Nama sudah ada sudah ada',
        ]);

        Pasien::create([
            'id' => $request->pasien_id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'nama_kk' => $request->nama_kk,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'no_hp' => $request->no_hp,
            'status_pasien' => $request->status_pasien,

        ]);

        return redirect()->route('form-pendaftaran')->with('success', 'Biodata Sudah Berhasil Terkirim!.Silahkan Pilih Poli');
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
