<?php

namespace App\Http\Controllers\DataPasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien\Pasien;
use App\Exports\Pasien\PasienExport;
use Maatwebsite\Excel\Facades\Excel;

class PasienExportController extends Controller
{
    public function exportPasien()
    {
        return Excel::download(new PasienExport, 'pasien.xlsx');
    }
}
