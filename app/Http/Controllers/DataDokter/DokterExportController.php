<?php

namespace App\Http\Controllers\DataDokter;

use App\Exports\Dokter\DokterExport;
use App\Http\Controllers\Controller;
use App\Models\Dokter\Dokter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DokterExportController extends Controller
{
    public function exportDokter()
    {
        return Excel::download(new DokterExport, 'dokter.xlsx');
    }
}
