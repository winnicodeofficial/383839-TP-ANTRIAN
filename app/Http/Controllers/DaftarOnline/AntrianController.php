<?php

namespace App\Http\Controllers\DaftarOnline;

use App\Http\Controllers\Controller;
use App\Models\Antrian\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use App\Models\Dokter\Dokter;
use App\Models\Poli\Poli;

class AntrianController extends Controller
{
    public function formPendaftaran()
    {
        $dokter = Dokter::OrderBy('nama_dokter', 'asc')->get();
        $poli = Poli::orderBy('nama_poli', 'asc')->get();
        return view('daftar-online.antrian.index', compact('dokter', 'poli'));
    }
    public function submitPendaftaran(Request $request)
    {
        // Validate the request data
        $request->validate([
            'poli_id' => 'required',
            'dokter_id' => 'required',
        ]);

        // Check if an existing record with the same criteria already exists
        $existingAntrian = Antrian::where('poli_id', $request->input('poli_id'))
            ->where('dokter_id', $request->input('dokter_id'))
            ->whereDate('created_at', now()->toDateString())
            ->first();

        if ($existingAntrian) {
            // If a record already exists, update it instead of creating a new one
            $antrian = $existingAntrian;
        } else {
            // Otherwise, create a new Antrian
            $antrian = new Antrian;
            $antrian->nomor_antrian = 'A1-' . str_pad(Antrian::count() + 1, 3, '0', STR_PAD_LEFT);
        }

        // Set the other fields
        $antrian->poli_id = $request->input('poli_id');
        $antrian->dokter_id = $request->input('dokter_id');
        $antrian->save();

        // Check the current count of registrations
        $jumlahAntrian = Antrian::count();

        // Set the locale to Bahasa Indonesia
        Carbon::setLocale('id');

        // Format the date in Bahasa Indonesia
        $formattedDate = Carbon::parse($antrian->created_at)->isoFormat('dddd, D MMMM YYYY [Pukul] H:mm [WIB]');

        // Add the formatted date to the $antrian object
        $antrian->formattedDate = $formattedDate;

        if ($jumlahAntrian >= 5) {
            // Pendaftaran ditutup karena jumlah antrian sudah mencapai batas
            return redirect()->back()->with('error', 'Pendaftaran ditutup karena jumlah antrian sudah mencapai batas.');
        }

        // Generate QR code using simple-qrcode
        $qrCode = QrCode::size(200)->generate($antrian->nomor_antrian);

        // Convert QR code to base64 for embedding in the PDF
        $qrCodeBase64 = base64_encode($qrCode);

        // Buat PDF dan tampilkan
        $pdf = PDF::loadView('daftar-online.antrian.pdf', compact('antrian', 'qrCodeBase64'));
        return $pdf->download('antrian_' . $antrian->nomor_antrian . '.pdf');

        // Pendaftaran berhasil, tampilkan SweetAlert
        return redirect()->route('daftar-online.index')->with('success', 'Pendaftaran berhasil!');
    }

    public function lihatAntrian()
    {
        $antrians = Antrian::all();
        return view('antrian', compact('antrians'));
    }
}
