<?php

namespace App\Imports\Dokter;

use App\Models\Dokter\Dokter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DokterImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Dokter([
            'nama_dokter' => $row['nama_dokter'],
            // sesuaikan dengan nama kolom pada file Excel
        ]);
    }
}
