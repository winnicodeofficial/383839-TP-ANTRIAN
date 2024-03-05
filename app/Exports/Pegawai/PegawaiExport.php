<?php

namespace App\Exports\Pegawai;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PegawaiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('nip', 'name', 'alamat', 'email', 'status_pegawai', 'pendidikan', 'unit_kerja', 'level')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Sesuaikan nama kolom sesuai kebutuhan Anda
        return [
            'NIP',
            'Nama',
            'Alamat',
            'Email',
            'Status Pegawai',
            'Pendidikan',
            'Unit Kerja',
            'Jabatan',
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
