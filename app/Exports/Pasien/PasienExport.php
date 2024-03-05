<?php

namespace App\Exports\Pasien;

use App\Models\Pasien\Pasien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PasienExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pasien::select('nik', 'nama', 'nama_kk', 'alamat', 'tanggal_lahir', 'usia', 'no_hp')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Sesuaikan nama kolom sesuai kebutuhan Anda
        return [
            'NIK',
            'Nama',
            'Nama KK',
            'Alamat',
            'Tanggal Lahir',
            'Usia',
            'No HP',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                $event->sheet->getDelegate()->getStyle('A2:G' . ($event->sheet->getDelegate()->getHighestRow()))
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}
