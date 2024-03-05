<?php

namespace App\Http\Controllers\DataKunjung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\Kunjung\KunjungExport;
use Maatwebsite\Excel\Facades\Excel;

class KunjungExportController extends Controller
{
    public function exportKunjung()
    {
        return Excel::download(new KunjungExport, 'kunjung.xlsx');
    }
}
