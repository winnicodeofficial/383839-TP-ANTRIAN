<?php

namespace App\Http\Controllers\Dianogsa;

use App\Http\Controllers\Controller;
use App\Models\Dianogsa\Dianogsa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DianogsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dianogsa = Dianogsa::OrderBy('nama', 'asc')->get();
        return view('data-dianogsa.index', compact('dianogsa'));
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

        Dianogsa::create([
            'id' => $request->poli_id,
            'no_rm' => $request->no_rm,
            'nama' => $request->nama,
            'dianogsa' => $request->dianogsa,
            'tanggal_periksa' => $request->tanggal_periksa,
        ]);

        return redirect()->route('data-dianogsa.index')->with('success', 'berhasil');
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
        $dianogsa = Dianogsa::findOrFail($id);
        $dianogsa->delete();

        return back()->with('success', 'Data Dianogsa berhasil dihapus!');
    }

    public function reset()
    {
        Dianogsa::truncate();

        return redirect()->route('data-dianogsa.index')->with('danger', 'Reset successful!');
    }
}
