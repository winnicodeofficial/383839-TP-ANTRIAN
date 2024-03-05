<?php

namespace App\Http\Controllers\DataJadwalPraktek;

use App\Exports\Jadwal\JadwalExport;
use App\Exports\Jadwal\JadwalExport\JadwalExport as JadwalExportJadwalExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal\Jadwal;
use Maatwebsite\Excel\Facades\Excel;

class JadwalExportController extends Controller
{
    public function exportJadwal()
    {
        return Excel::download(new JadwalExport, 'jadwal.xlsx');
    }
}
