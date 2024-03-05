<?php

namespace App\Http\Controllers\DataPasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasienExport extends Controller
{
    public function exportPasien()
    {
        return Excel::download(new PasienExport, 'pasien.xlsx');
    }
}
