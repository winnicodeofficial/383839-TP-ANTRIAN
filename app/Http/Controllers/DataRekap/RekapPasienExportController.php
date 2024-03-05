<?php

namespace App\Http\Controllers\DataRekap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\Rekap\RekapExport;
use Maatwebsite\Excel\Facades\Excel;

class RekapPasienExportController extends Controller
{
    public function exportRekap(Request $request)
    {
        // Retrieve the start_date and end_date from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Call a validation method to check the date format
        if (!$this->isValidDate($startDate) || !$this->isValidDate($endDate)) {
            return redirect()->back()->with('error', 'Invalid date range');
        }

        // Create an instance of RekapExport with date range parameters
        $export = new RekapExport($startDate, $endDate);

        // Download the Excel file
        return Excel::download($export, 'rekap-pasien.xlsx');
    }

    // Validation method to check if the date is in a valid format
    private function isValidDate($date)
    {
        return $date && strtotime($date);
    }
}
