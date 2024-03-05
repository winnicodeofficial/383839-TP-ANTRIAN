<?php

namespace App\Http\Controllers\DataPoli;

use App\Http\Controllers\Controller;
use App\Models\Poli\Poli;
use Illuminate\Http\Request;

class DataPoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poli = Poli::OrderBy('nama_poli', 'asc')->get();
        return view('relations.poli.index', compact('poli'));
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
            'nama_poli' => 'required|unique:data_polis',
        ], [
            'nama_poli.unique' => 'Poli sudah ada',
        ]);

        Poli::create([
            'id' => $request->poli_id,
            'nama_poli' => $request->nama_poli,
        ]);

        return back()->with('success', 'Data poli berhasil dibuat!');
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
        $poli = Poli::findOrFail($id);
        return view('relations.poli.edit', compact('poli'));
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
        $this->validate($request, [
            'nama_poli' => 'unique:data_polis',
        ], [
            'nama_poli.unique' => 'Poli sudah ada',
        ]);

        $data = $request->all();

        $poli = Poli::findOrFail($id);
        $poli->update($data);

        return redirect()->route('data-poli.index')->with('success', 'Data Poli berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();

        return back()->with('success', 'Data Poli berhasil dihapus!');
    }
}
