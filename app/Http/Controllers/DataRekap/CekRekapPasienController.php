<?php

namespace App\Http\Controllers\DataRekap;

use App\Http\Controllers\Controller;
use App\Models\Pasien\Pasien;
use App\Models\Rekap\Rekap;
use Illuminate\Http\Request;

class CekRekapPasienController extends Controller
{
    public function CekRekapPasien()
    {
        $rekap = Rekap::orderBy('nama_pasien', 'asc')->get();
        return view('data-rekap.index', compact('rekap'));
    }

    public function ValidasiRekapPasien(Request $request)
    {
        $cek = $request->input('nik');
        $data = Pasien::where('nik', $cek)->first();

        if ($data) {
            return view('data-rekap.cek.valid', compact('data'));
        } else {
            return view('data-rekap.cek.novalid');
        }
    }
}
