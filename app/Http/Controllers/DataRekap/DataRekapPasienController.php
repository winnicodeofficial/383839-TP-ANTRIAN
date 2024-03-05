<?php

namespace App\Http\Controllers\DataRekap;

use App\Http\Controllers\Controller;
use App\Models\JenisPasien\JenisPasien;
use App\Models\Pasien\Pasien;
use App\Models\Rekap\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Illuminate\Validation\Rule;

class DataRekapPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekap = Rekap::orderBy('no_rm', 'asc')->get();
        return view('data-rekap.index', compact('rekap'));
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
            'nama_pasien' => [
                'required',
                Rule::unique('data_rekaps')->ignore($request->pasien_id),
            ],
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'usia' => 'required',
            'no_hp' => 'required',
            'status_pasien' => 'required',
        ], [
            'nama_pasien.required' => 'Nama Pasien harus diisi.',
            'nama_pasien.unique' => 'Nama Pasien sudah ada.',
            'alamat.required' => 'Alamat harus diisi.',
            'tanggal_lahir' => 'Tanggal Lahir Harus Diisi',
            'usia.required' => 'Usia harus diisi.',
            'no_hp.required' => 'No. HP harus diisi.',
            'status_pasien.required' => 'Jenis Pasien harus diisi.',
        ]);

        $id = $request->pasien_id;

        Rekap::create([
            'id' => $request->pasien_id,
            'no_rm' => $this->generateNoRm($id),
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'no_hp' => $request->no_hp,
            'status_pasien' => $request->status_pasien,
        ]);

        return redirect()->route('data-rekap.index')->with('success', 'Data rekap berhasil disimpan');
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
        $rekap = Rekap::findOrFail($id);
        return view('data-rekap.edit', compact('rekap'));
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
            'no_rm' => 'unique:data_rekaps,no_rm,' . $id, // tambahkan $id untuk mengabaikan data yang sedang diupdate
        ], [
            'no_rm.unique' => 'Rekap Medis sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->route('data-rekap.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $rekap = Rekap::findOrFail($id);
        $rekap->update($data);

        return redirect()->route('data-rekap.index')->with('success', 'Data rekap berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rekap::find($id)->delete();
        return back()->with('success', 'Data Rekap berhasil dihapus!');
    }

    protected function generateNoRm($id)
    {
        // Mengambil jumlah total data di database
        $totalData = Rekap::count();

        // Increment total data untuk mendapatkan urutan yang benar
        $order = $totalData + 1;

        // Memastikan memiliki dua digit untuk urutan
        $twoDigitOrder = str_pad($order, 2, '0', STR_PAD_LEFT);

        // Mengonversi ke format yang diinginkan
        $noRm = "00-00-{$twoDigitOrder}";

        return $noRm;
    }
}
