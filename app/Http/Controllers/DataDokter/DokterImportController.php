<?php

namespace App\Http\Controllers\DataDokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\Dokter\DokterImport;
use App\Models\Dokter\Dokter;
use Maatwebsite\Excel\Facades\Excel;

class DokterImportController extends Controller
{
    public function importForm()
    {
        return view('data-dokter.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        $file = $request->file('file');

        Excel::import(new DokterImport, $file);

        return redirect()->route('data-dokter.index')->with('success', 'Data dokter berhasil diimport.');
    }
}
