<?php

namespace App\Http\Controllers\DataDokter;

use App\Http\Controllers\Controller;
use App\Models\Dokter\Dokter;
use App\Models\Poli\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::OrderBy('nama_dokter', 'asc')->get();
        return view('data-dokter.index', compact('dokter'));
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
            'nama_dokter' => 'required|unique:data_dokters'
        ], [
            'nama_dokter.unique' => 'Nama Dokter sudah ada'
        ]);

        Dokter::create($request->all());

        return redirect()->route('data-dokter.index')->with('success', 'Data dokter berhasil disimpan');
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
        $dokter = Dokter::findOrFail($id);
        return view('data-dokter.edit', compact('dokter'));
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
            'nama_dokter' => 'unique:data_dokters,nama_dokter,' . $id, // tambahkan $id untuk mengabaikan data yang sedang diupdate
        ], [
            'nama_dokter.unique' => 'Nama Dokter sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->route('data-dokter.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $dokter = Dokter::findOrFail($id);
        $dokter->update($data);

        return redirect()->route('data-dokter.index')->with('success', 'Data dokter berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dokter::find($id)->delete();
        return back()->with('success', 'Data Dokter berhasil dihapus!');
    }
}
