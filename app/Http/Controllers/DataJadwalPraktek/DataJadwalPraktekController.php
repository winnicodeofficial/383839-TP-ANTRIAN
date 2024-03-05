<?php

namespace App\Http\Controllers\DataJadwalPraktek;

use App\Http\Controllers\Controller;
use App\Models\Dokter\Dokter;
use App\Models\Jadwal\Jadwal;
use App\Models\Poli\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataJadwalPraktekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::OrderBy('dokter_id', 'asc')->get();
        $poli = Poli::orderBy('nama_poli', 'asc')->get();
        $dokter = Dokter::orderBy('nama_dokter', 'asc')->get();
        return view('data-jadwalpraktek.index', compact('jadwal', 'poli', 'dokter'));
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
        $request->validate([
            'dokter_id' => 'required|unique:data_jadwalprakteks,dokter_id',
            'jadwal_awal' => 'required',
            'jadwal_akhir' => 'required',
            'hari_awal' => 'required',
            'hari_akhir' => 'required'
        ], [
            'dokter_id.required' => 'Nama dokter harus diisi.',
            'dokter_id.unique' => 'Nama dokter sudah ada.',
            'poli_id.required' => 'Poli harus diisi.',
            'jadwal_awal.required' => 'Waktu awal harus diisi.',
            'jadwal_akhir.required' => 'Waktu akhir harus diisi.',
            'hari_awal.required' => 'Hari Harus Diisi.',
            'hari_akhir.required' => 'Hari Harus Diisi',
            'jadwal_praktek.required' => 'Jadwal praktek harus diisi.',
            'hari_oper.required' => 'Hari Harus Diisi.'
        ]);

        $jadwal_awal = $request->input('jadwal_awal');
        $jadwal_akhir = $request->input('jadwal_akhir');
        $hari_awal = $request->input('hari_awal');
        $hari_akhir = $request->input('hari_akhir');
        $jadwal_praktek = $jadwal_awal . ' - ' . $jadwal_akhir;
        $hari_oper = $hari_awal . ' - ' . $hari_akhir;

        Jadwal::create([
            'dokter_id' => $request->input('dokter_id'),
            'poli_id' => $request->input('poli_id'),
            'jadwal_praktek' => $jadwal_praktek,
            'hari_oper' => $hari_oper,
        ]);

        return redirect()->route('data-jadwal-praktek.index')->with('success', 'Data Jadwal Praktek berhasil disimpan');
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
        $jadwal = Jadwal::findOrFail($id);
        $poli = Poli::orderBy('nama_poli', 'desc')->get();
        $dokter = Dokter::orderBy('nama_dokter', 'desc')->get();

        $hari_awal = explode(' - ', $jadwal->hari_oper)[0];
        $hari_akhir = explode(' - ', $jadwal->hari_oper)[1];
        return view('data-jadwalpraktek.edit', compact('jadwal', 'poli', 'dokter', 'hari_awal', 'hari_akhir'));
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
            'dokter_id' => 'unique:data_jadwalprakteks,dokter_id,' . $id,
            'jadwal_awal' => 'required',
            'jadwal_akhir' => 'required',
            'hari_awal' => 'required',
            'hari_akhir' => 'required'
        ], [
            'dokter_id.unique' => 'Nama Dokter sudah ada',
            'jadwal_awal.required' => 'Waktu awal harus diisi.',
            'jadwal_akhir.required' => 'Waktu akhir harus diisi.',
            'hari_awal.required' => 'Hari Harus Diisi',
            'hari_akhir.required' => 'Hari Harus Diisi'
        ]);

        if ($validator->fails()) {
            return redirect()->route('data-jadwal-praktek.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $jadwal_awal = $request->input('jadwal_awal');
        $jadwal_akhir = $request->input('jadwal_akhir');
        $hari_awal = $request->input('hari_awal');
        $hari_akhir = $request->input('hari_akhir');
        $jadwal_praktek = $jadwal_awal . ' - ' . $jadwal_akhir;
        $hari_oper = $hari_awal . ' - ' . $hari_akhir;

        $data = $request->all();
        $data['jadwal_praktek'] = $jadwal_praktek;
        $data['hari_oper'] = $hari_oper;

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($data);

        return redirect()->route('data-jadwal-praktek.index')->with('success', 'Data jadwal berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::find($id)->delete();
        return back()->with('success', 'Data Dokter berhasil dihapus!');
    }
}
