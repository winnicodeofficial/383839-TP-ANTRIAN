<?php

namespace App\Http\Controllers\DaftarOnline;

use App\Http\Controllers\Controller;
use App\Models\Antrian\Antrian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CekAntrianController extends Controller
{
    public function showForm()
    {
        return view('daftar-online.antrian.cek-antrian');
    }

    public function checkAntrian(Request $request)
    {
        $nomorAntrian = $request->input('nomor_antrian');
        $antrian = Antrian::where('nomor_antrian', $nomorAntrian)->first();

        if ($antrian) {
            return view('daftar-online.antrian.hasil-cek-antrian.index', compact('antrian'));
        } else {
            return view('daftar-online.antrian.cek-antrian-tidak-ada.index');
        }
    }

    public function generatePDF($id)
    {
        // Fetch Antrian by ID
        $antrian = Antrian::find($id);

        // Initialize QR code base64
        $qrCodeBase64 = '';

        // Check if Antrian exists
        if ($antrian) {
            // Generate QR code using simple-qrcode
            $qrCode = QrCode::size(200)->generate($antrian->nomor_antrian);

            // Convert QR code to base64 for embedding in the PDF
            $qrCodeBase64 = base64_encode($qrCode);
        }

        // Check if Antrian exists again (in case it was not found earlier)
        if (!$antrian) {
            // Antrian not found, handle accordingly (redirect or show error)
            abort(404, 'Antrian not found');
        }

        // Example using the DomPDF library
        $pdf = PDF::loadView('daftar-online.antrian.hasil-cek-antrian.pdf', ['antrian' => $antrian, 'qrCodeBase64' => $qrCodeBase64]);

        return $pdf->download('unduh_ulang_antrian_' . $antrian->nomor_antrian . '.pdf');
    }
}
