<?php

namespace App\Exports\Rekap;

use App\Models\Rekap\Rekap;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class RekapExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return Rekap::select('no_rm', 'nama_pasien', 'alamat', 'usia', 'no_hp', 'status_pasien')
            ->whereBetween('created_at', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59'])
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return ['No. RM', 'Nama Pasien', 'Alamat', 'Usia', 'No. HP', 'Status Pasien'];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Insert a note about the date range
                $event->sheet->setCellValue('A8', 'Rekap Data Pasien');
                $event->sheet->setCellValue('A9', 'Tanggal: ' . $this->startDate . ' - ' . $this->endDate);

                // Apply formatting to the note
                $event->sheet->getStyle('A1:H5', 'A8:A9')->applyFromArray([
                    'font' => [
                        'bold' => false,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                // Apply center alignment for the headings
                $event->sheet->getStyle('A1:H1')
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // Set print area and adjust page orientation
                $printArea = 'A1:H' . $event->sheet->getDelegate()->getHighestRow();
                $event->sheet->getPageSetup()->setPrintArea($printArea);
                $event->sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
            },
        ];
    }
}
