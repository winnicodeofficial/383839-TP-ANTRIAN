<?php

namespace App\Http\Controllers\DataPegawai;

use App\Exports\Pegawai\PegawaiExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiExportController extends Controller
{
    public function exportPegawai()
    {
        return Excel::download(new PegawaiExport, 'pegawai.xlsx');
    }
}
