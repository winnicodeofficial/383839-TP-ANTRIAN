<?php

namespace App\Http\Controllers\DaftarOnline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Poli\Poli;
use App\Models\Jadwal\Jadwal;
use App\Models\Rekap\Rekap;
use App\Models\Pasien\Pasien;
use App\Models\JenisPasien\JenisPasien;

class DaftarOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('daftar-online.index');
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

    public function checkData(Request $request)
    {
        $no_rm = $request->input('no_rm');

        // Check if the record with the given name exists
        $data = Rekap::where('no_rm', $no_rm)->first();

        if ($data) {
            // Data found, display details
            return view('daftar-online.cek-rm.hasil', compact('data'));
        } else {
            // Data not found, show a message
            return view('daftar-online.cek-rm.tidak-ditemukan');
        }
    }
}
