<?php

namespace App\Exports\Jadwal;

use App\Models\Jadwal\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JadwalExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Jadwal::join('data_polis', 'data_jadwalprakteks.poli_id', '=', 'data_polis.id')
            ->join('data_dokters', 'data_jadwalprakteks.dokter_id', '=', 'data_dokters.id')
            ->select('data_dokters.nama_dokter', 'data_polis.nama_poli as poli', 'data_jadwalprakteks.jadwal_praktek')
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Sesuaikan nama kolom sesuai kebutuhan Anda
        return [
            'Nama Dokter',
            'Poli',
            'Jadwal Praktek'
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
