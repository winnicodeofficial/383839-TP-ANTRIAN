<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Dokter\Dokter;
use App\Models\Kunjung\Kunjung;
use App\Models\Pasien\Pasien;
use App\Models\Poli\Poli;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $dokter_count = Dokter::count();
        $pasien_count = Pasien::count();
        $kunjung_count = Kunjung::count();
        $pegawai_count = User::count();
        $poli_count = Poli::count();



        return view('home', compact('dokter_count', 'pasien_count', 'kunjung_count', 'pegawai_count', 'poli_count'));
    }
}
