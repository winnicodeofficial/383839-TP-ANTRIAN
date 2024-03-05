<?php

namespace App\Http\Controllers\Dianogsa;

use App\Http\Controllers\Controller;
use App\Models\Dianogsa\Dianogsa;
use App\Models\Rekap\Rekap;
use Illuminate\Http\Request;

class CekDianogsaController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_rm' => 'required|unique:data_dianogsas',
        ], [
            'no_rm.unique' => 'Nama sudah ada',
        ]);

        Dianogsa::create([
            'id' => $request->poli_id,
            'no_rm' => $request->no_rm,
            'nama' => $request->nama,
            'dianogsa' => $request->dianogsa,
            'tanggal_periksa' => $request->tanggal_periksa,
        ]);

        return redirect()->route('data-dianogsa.index')->with('success', 'berhasil');
    }

    public function CekPasien()
    {
        return view('data-dianogsa.cek.index');
    }

    public function ValidasiPasien(Request $request)
    {
        $cek = $request->input('no_rm');
        $data = Rekap::where('no_rm', $cek)->first();

        if ($data) {
            return view('data-dianogsa.cek.valid', compact('data'));
        } else {
            return view('data-dianogsa.cek.novalid');
        }
    }
}
