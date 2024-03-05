<?php

namespace App\Http\Controllers\DataKunjung;

use App\Http\Controllers\Controller;
use App\Models\Kunjung\Kunjung;
use App\Models\Poli\Poli;
use App\Models\Antrian\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataKunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poli = Antrian::orderBy('poli_id', 'asc')->get();
        return view('data-kunjung.index', compact('poli'));
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
            'nama_pasien' => 'required|unique:data_kunjungs'
        ], [
            'nama_pasien.unique' => 'Nama Pasien sudah ada'
        ]);

        Kunjung::create($request->all());

        return redirect()->route('data-kunjung.index')->with('success', 'Data dokter berhasil disimpan');
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
        $kunjung = Kunjung::findOrFail($id);
        $poli = Poli::orderBy('nama_poli', 'desc')->get();
        return view('data-kunjung.edit', compact('kunjung', 'poli'));
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
            'no_daftar' => 'unique:data_kunjungs,no_daftar,' . $id, // tambahkan $id untuk mengabaikan data yang sedang diupdate
        ], [
            'no_daftar.unique' => 'Nomor Daftar sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->route('data-kunjung.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $kunjung = Kunjung::findOrFail($id);
        $kunjung->update($data);

        return redirect()->route('data-kunjung.index')->with('success', 'Data kunjungan berhasil diperbaharui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kunjung::find($id)->delete();
        return back()->with('success', 'Data Dokter berhasil dihapus!');
    }
    public function reset()
    {
        // Your reset logic goes here
        // For example, you might want to delete all records in the Kunjungan model

        Antrian::truncate();

        return redirect()->route('data-kunjung.index')->with('success', 'Reset successful!');
    }
}
