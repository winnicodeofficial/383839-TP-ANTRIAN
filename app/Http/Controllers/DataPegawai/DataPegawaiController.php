<?php

namespace App\Http\Controllers\DataPegawai;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = User::orderBy('name', 'asc')->get();
        return view('data-pegawai.index', compact('pegawai'));
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
            'nip' => 'required|unique:users',
        ], [
            'nip.unique' => 'NIP Sudah Ada',
        ]);

        $hashedPassword = Hash::make($request->password);

        User::create([
            'id' => $request->pegawai_id,
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'status_pegawai' => $request->status_pegawai,
            'unit_kerja' => $request->unit_kerja,
            'password' => $hashedPassword,
            'pendidikan' => $request->pendidikan,
            'level' => $request->level,
            'jabatan' => $request->jabatan,

        ]);

        return back()->with('success', 'Data Pegawai berhasil dibuat!');
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
        $pegawai = User::findOrFail($id);
        return view('data-pegawai.edit', compact('pegawai'));
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
            'nip' => 'unique:users,nip,' . $id, // tambahkan $id untuk mengabaikan data yang sedang diupdate

        ], [
            'nip.unique' => 'Nip sudah ada',

        ]);

        if ($validator->fails()) {
            return redirect()->route('data-pegawai.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $pegawai = User::findOrFail($id);
        $pegawai->update($data);

        return redirect()->route('data-pegawai.index')->with('success', 'Data pegawai berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = User::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('data-pegawai.index')->with('success', 'Data Pegawai berhasil dihapus!');
    }
}
