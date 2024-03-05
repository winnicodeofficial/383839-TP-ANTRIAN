<?php

use App\Exports\Dokter\DokterExport;
use App\Exports\Pasien\PasienExport;
use App\Http\Controllers\AksesTerbatas\AksesTerbatasController;
use App\Http\Controllers\Commodities\Ajax\CommodityAjaxController;
use App\Http\Controllers\Commodities\CommodityController;
use App\Http\Controllers\Commodities\CommodityExportImportController;
use App\Http\Controllers\Commodities\PdfController;
use App\Http\Controllers\CommodityLocations\Ajax\CommodityLocationAjaxController;
use App\Http\Controllers\CommodityLocations\CommodityLocationController;
use App\Http\Controllers\DaftarOnline\AntrianController;
use App\Http\Controllers\DaftarOnline\AntrianPoli\AntrianPoliController;
use App\Http\Controllers\DaftarOnline\CekAntrianController;
use App\Http\Controllers\DaftarOnline\Daftar\PendaftaranController;
use App\Http\Controllers\DaftarOnline\DaftarOnlineController;
use App\Http\Controllers\DataPasien\DataPasienController;
use App\Http\Controllers\DataPoli\DataPoliController;
use App\Http\Controllers\DataDokter\DataDokterController;
use App\Http\Controllers\DataJadwalPraktek\DataJadwalPraktekController;
use App\Http\Controllers\DataJenisPasien\DataJenisPasienController;
use App\Http\Controllers\DataKunjung\DataKunjungController;
use App\Http\Controllers\DataPasien\PasienExportController;
use App\Http\Controllers\DataDokter\DokterExportController;
use App\Http\Controllers\DataDokter\DokterImportController;
use App\Http\Controllers\DataJadwalPraktek\JadwalExportController;
use App\Http\Controllers\DataKunjung\KunjungExportController;
use App\Http\Controllers\DataPegawai\DataPegawaiController;
use App\Http\Controllers\DataPegawai\PegawaiExportController;
use App\Http\Controllers\DataRekap\CekRekapPasienController;
use App\Http\Controllers\DataRekap\DataRekapPasienController;
use App\Http\Controllers\DataRekap\RekapPasienExportController;
use App\Http\Controllers\DataRekap\RekapPasienImportController;
use App\Http\Controllers\DataRekap\ValidasiPasien\CekPasienController;
use App\Http\Controllers\DataRekap\ValidasiPasien\ValidasiPasienController;
use App\Http\Controllers\Dianogsa\CekDianogsaController;
use App\Http\Controllers\Dianogsa\DianogsaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Karyawan\Ajax\KaryawanAjaxController;
use App\Http\Controllers\Karyawan\KaryawanController;
use App\Http\Controllers\SchoolOperationalAssistances\Ajax\SchoolOperationalAssistanceAjaxController;
use App\Http\Controllers\SchoolOperationalAssistances\SchoolOperationalAssistance;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Surat\SuratController;
use App\Models\Jadwal\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/tidak-diizinkan', AksesTerbatasController::class);
Route::get('/db-unduh', [AksesTerbatasController::class, 'Database']);
/*ERROR*/
Route::fallback(function () {
    return view('errors.404');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'auth'], function () {
    Auth::routes();
});

Route::group(['prefix' => 'excel', 'as' => 'excel.barang.', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'barang'], function () {
        Route::get('/export', [CommodityExportImportController::class, 'export'])->name('export');
        Route::post('/import', [CommodityExportImportController::class, 'import'])->name('import');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'simpan'])->name('settings.simpan');

    Route::resource('/data-pasien', DataPasienController::class);
    Route::get('/export-pasien-excel', [PasienExportController::class, 'exportPasien']);
    Route::resource('/data-dokter', DataDokterController::class);

    Route::resource('/data-jadwal-praktek', DataJadwalPraktekController::class);

    /*KUNJUNGAN*/
    Route::resource('/data-kunjung', DataKunjungController::class);

    /*DATA REKAP*/
    Route::resource('/data-rekap', DataRekapPasienController::class);
    Route::get('/cek-rekap', [CekRekapPasienController::class, 'CekRekapPasien']);
    Route::post('/cek-rekap', [CekRekapPasienController::class, 'ValidasiRekapPasien'])->name('cek-rekap');

    Route::resource('/data-poli', DataPoliController::class);

    /*PEGAWAI*/
    Route::middleware(['auth', 'LevelAkses'])->group(function () {
        Route::resource('/data-pegawai', DataPegawaiController::class);
    });

    /*DIANOGSA*/
    Route::resource('/data-dianogsa', DianogsaController::class);
    Route::get('/cek-dianogsa', [CekDianogsaController::class, 'CekPasien']);
    Route::post('/cek-dianogsa', [CekDianogsaController::class, 'ValidasiPasien'])->name('cek-dianogsa');
    Route::post('/cek-dianogsa/reset', [DianogsaController::class, 'reset'])->name('data-dianogsa.reset');
});

/*RESET KUNJUNGAN*/
Route::get('/data-kunjungan/reset', [DataKunjungController::class, 'reset'])->name('data-kunjungan.reset');

Route::resource('/', DaftarOnlineController::class);
Route::get('/check-data', [DaftarOnlineController::class, 'checkData']);

/*PENDAFTARAN*/
Route::resource('/pendaftaran', PendaftaranController::class);
Route::resource('/biodata-pasien', PendaftaranController::class);

/*ANTRIAN*/
Route::resource('/antrian', AntrianPoliController::class);
Route::get('/form-pendaftaran', [AntrianController::class, 'formPendaftaran'])->name('form-pendaftaran');
Route::post('/terimakasih-telah-mengisi-pendaftaran-online', [AntrianController::class, 'submitPendaftaran']);
Route::get('/lihat-antrian', [AntrianController::class, 'lihatAntrian']);


/*CEK ANTRIAN*/
Route::get('/check-antrian', [CekAntrianController::class, 'showForm']);
Route::post('/check-antrian', [CekAntrianController::class, 'checkAntrian']);
Route::get('/generate-pdf/{id}', [CekAntrianController::class, 'generatePDF'])->name('generate-pdf');

/*MTC*/
Route::get('/cetak-antrian', [AntrianPoliController::class, 'Main']);

/*EXPORT*/
Route::group(['prefix' => 'excel', 'as' => 'excel.', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'pasien'], function () {
        Route::get('/export', [PasienExportController::class, 'exportPasien'])->name('pasien.export');
    });
    Route::group(['prefix' => 'dokter'], function () {
        Route::get('/export', [DokterExportController::class, 'exportDokter'])->name('dokter.export');
    });
    Route::group(['prefix' => 'jadwal'], function () {
        Route::get('/export', [JadwalExportController::class, 'exportJadwal'])->name('jadwal.export');
    });
    Route::group(['prefix' => 'pegwai'], function () {
        Route::get('/export', [PegawaiExportController::class, 'exportPegawai'])->name('pegawai.export');
    });
    Route::group(['prefix' => 'rekap'], function () {
        Route::get('/export', [RekapPasienExportController::class, 'exportRekap'])->name('rekap.export');
    });
    Route::group(['prefix' => 'kunjung'], function () {
        Route::get('/export', [KunjungExportController::class, 'exportKunjung'])->name('kunjung.export');
    });
});

/*IMPORT*/
Route::group(['prefix' => 'excel', 'as' => 'excel.', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'pasien'], function () {
        Route::get('/import', [DokterImportController::class, 'importForm'])->name('dokter.import');
        Route::post('/import', [DokterImportController::class, 'import'])->name('dokter.import');
        Route::get('/dokter/template', [DokterImportController::class, 'downloadTemplate'])->name('dokter.template');
    });
    Route::group(['prefix' => 'rekap'], function () {
        Route::get('/import', [RekapPasienImportController::class, 'importForm'])->name('rekap.import');
        Route::post('/import', [RekapPasienImportController::class, 'import'])->name('rekap.import');
        Route::get('/dokter/template', [RekapPasienImportController::class, 'downloadTemplate'])->name('rekap.template');
    });
});

Route::post('/import-rekap', [RekapPasienImportController::class, 'import']);
