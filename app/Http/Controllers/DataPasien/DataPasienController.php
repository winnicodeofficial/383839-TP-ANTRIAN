<?php

namespace App\Http\Controllers\DataPasien;

use App\Http\Controllers\Controller;
use App\Models\Pasien\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exports\PasienExport;
use Maatwebsite\Excel\Facades\Excel;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::orderBy('nama', 'asc')->get();
        return view('data-pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
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
            'nik.unique' => 'Nama Pasien sudah ada',
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

        return back()->with('success', 'Data pasien berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('data-pasien.edit', compact('pasien'));
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
        $validator = Validator::make($request->all(), [
            'nik' => 'unique:data_pasiens,nik,' . $id, // tambahkan $id untuk mengabaikan data yang sedang diupdate
            'nama' => 'unique:data_pasiens,nama,' . $id, // tambahkan $id untuk mengabaikan data yang sedang diupdate
        ], [
            'nik.unique' => 'Nik sudah ada',
            'nama.unique' => 'Nama Pasien sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->route('data-pasien.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $pasien = Pasien::findOrFail($id);
        $pasien->update($data);

        return redirect()->route('data-pasien.index')->with('success', 'Data Pasien berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('data-pasien.index')->with('success', 'Data Pasien berhasil dihapus!');
    }
}
